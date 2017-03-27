<?php

class User
{
    private $name;
    private $id;
    private $hashPassword;
    private $isLoggin;
    private $DBConnect;
    private $permissions = [];

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

    private function getRoles()
    {
        $statement = $this->DBConnect->sendQuery("
        SELECT perm FROM Roles_perm WHERE (SELECT Users.level_role FROM Users WHERE Users.login=:name)<=Roles_perm.level", [
            "name" => $this->name
        ]);
        $this->permissions = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
    }

    public function havePerm($perm)
    {
        return in_array($perm, $this->permissions) && $this->isLoggin;
    }

    public function registration($name,$password,$email,$passport,$phone){
        $Statement = $this->DBConnect->sendQuery("
        INSERT INTO `Users`(`login`, `password`, `first_name`, `second_name`, `phone`, `passport`) 
        VALUES (:name,:password,:first_name,:second_name,:phone,:passport)
        ",[
            "name"=>$name,
            "password"=>sha1($name),
            "first_name"=>$name,
            "second_name"=>$name,
            "phone"=>$name,
            "passport"=>$name
        ]);
       // if ($)
    }

    public function isLoggin()
    {
        return $this->isLoggin;
    }


}