<?php

/**
 * Class User
 */
class User
{
    /**
     * @var
     */
    private $name;
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $hashPassword;
    /**
     * @var
     */
    private $isLoggin;
    /**
     * @var
     */
    private $DBConnect;
    /**
     * @var array
     */
    private $permissions = [];

    /**
     * User constructor.
     * @param $DBConnect
     * @param $session
     */
    function __construct($DBConnect, $session)
    {
        $this->DBConnect = $DBConnect;
        $statement = $DBConnect->sendQuery("
          SELECT COUNT(User_session.id_user) as Count,User_session.id_user as id,login FROM User_session
          INNER JOIN Users on Users.id_user = User_session.id_user WHERE session_id=:session", [
            "session" => $session
        ]);
        $statement->execute();
        $row = $statement->fetch();
        $this->isLoggin = $row["Count"];
        $this->id = $row["id"];
        $this->name = $row["login"];
        $this->getRoles();
    }

    /**
     * @param $name
     * @param $password
     * @param $session
     * @return bool
     */
    public function auth($name, $password, $session)
    {
        if (!$this->isLoggin) {
            $this->name = $name;
            $this->hashPassword = sha1($password);
            if ($this->exist()) {
                $statement = $this->DBConnect->sendQuery("
                INSERT INTO User_session (id_user,session_id) VALUES (:id,:session) 
                ON DUPLICATE KEY UPDATE session_id=:session", [
                    "id" => $this->id,
                    "session" => $session
                ]);
                $statement->execute();
                return true;
            } else {
                return false;
            }
        }
        return true;
    }

    /**
     * @return bool
     */
    private function exist()
    {
        $statement = $this->DBConnect->sendQuery("
        SELECT COUNT(id_user) as Count,id_user as id FROM Users WHERE login=:name AND password=:password", [
            "name" => $this->name,
            "password" => $this->hashPassword
        ]);
        $row = $statement->fetch();
        $this->isLoggin = $row['Count'];
        $this->id = $row['id'];
        if ($this->isLoggin) {
            $this->getRoles();
            return true;
        }
        return false;
    }

    /**
     *
     */
    private function getRoles()
    {
        $statement = $this->DBConnect->sendQuery("
        SELECT perm FROM Roles_perm WHERE (SELECT Users.level_role FROM Users WHERE Users.login=:name)<=Roles_perm.level", [
            "name" => $this->name
        ]);
        $this->permissions = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
    }

    /**
     * @param $perm
     * @return bool
     */
    public function havePerm($perm)
    {
        return in_array($perm, $this->permissions) && $this->isLoggin;
    }

    /**
     * @param $login
     * @param $password
     * @param $email
     * @param $passport
     * @param $phone
     * @param $firstName
     * @param $secondName
     * @return RegistrationData
     * @internal param $name
     */
    public function registration($login, $password, $email, $passport, $phone, $firstName, $secondName)
    {
        $validData = new RegistrationData($this->DBConnect, [
            "firstName"=>$firstName,
            "secondName"=>$secondName,
            "login" => $login,
            "phone" => $phone,
            "passport" => $passport,
            "password" =>$password,
            "email" => $email]);
        if ($validData->getValid()) {
            $this->DBConnect->sendQuery("
        INSERT INTO `Users`(`login`, `password`, `first_name`, `second_name`, `phone`, `passport`,`email`) 
        VALUES (:login,:password,:first_name,:second_name,:phone,:passport,:email)
        ", [
                "login" => $login,
                "password" => sha1($password),
                "first_name" => $firstName,
                "second_name" => $secondName,
                "phone" => $phone,
                "passport" => $passport,
                "email" => $email
            ]);
        }
        return $validData;
    }

    /**
     *
     */
    public function logout(){
        if ($this->isLoggin()){
            $statement = $this->DBConnect->sendQuery("DELETE FROM `User_session` WHERE `id_user` = :id",[
                "id"=>$this->id
            ]);
            if (!$this->DBConnect->hasError())
            $this->isLoggin=false;
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function isLoggin()
    {
        return $this->isLoggin;
    }


}