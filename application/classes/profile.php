<?php

/**
 * Created by PhpStorm.
 * User: bigtows
 * Date: 15/04/2017
 * Time: 19:16
 */
class Profile
{
    private $user;
    private $DBConnect;
    private $firstName;
    private $secondName;
    private $passport;
    private $telephone;
    private $email;

    function __construct($user, $DBConnect)
    {
        $this->user = $user;
        $this->DBConnect = $DBConnect;
        $this->setPersonalData();

    }

    public function setPersonalData()
    {
        $statment = $this->DBConnect->sendQuery("SELECT * FROM Profile WHERE id_user=:id", [
                "id" => $this->user->getId()]
        );
        $row = $statment->fetch();
        $this->firstName = $row['first_name'];
        $this->secondName = $row['second_name'];
        $this->telephone = $row['phone'];
        $this->passport = $row['passport'];
        $this->email = $row['email'];
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassport()
    {
        return $this->passport;
    }

    /**
     * @return mixed
     */
    public function getSecondName()
    {
        return $this->secondName;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

}