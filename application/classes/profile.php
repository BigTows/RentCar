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

    private $orders = array();

    function __construct($user, $DBConnect)
    {
        $this->user = $user;
        $this->DBConnect = $DBConnect;
        $this->setPersonalData();
        $this->setOrdersData();
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

    /**
     * @TODO fix SQL view freeCars
     */

    public function setOrdersData()
    {
        $statment = $this->DBConnect->sendQuery("SELECT * FROM Relevant_orders WHERE id_user=:id", [
                "id" => $this->user->getId()]
        );
        foreach ($statment->fetchAll() as $row) {
            $order = [];
            $order += array("id_order" => $row["id_order"]);
            $order += array("date_begin" => $row["date_begin"]);
            $order += array("date_end" => $row["date_end"]);
            $order += array("model" => $row["model"]);
            $order += array("brand" => $row["brand"]);
            $statmentLocation = $this->DBConnect->sendQuery("SELECT * FROM Locations INNER JOIN History_locations on History_locations.id_location = Locations.id_location WHERE History_locations.id_rolling_car=:idCar ORDER BY History_locations.date DESC LIMIT 1",
                ["idCar"=>$row['id_rolling_car']]);
            $statmentLocation->execute();
            $rowLcoation = $statmentLocation->fetch();
            $order += array("latitude" => $rowLcoation["latitude"]);
            $order += array("longitude" => $rowLcoation["longitude"]);
            array_push($this->orders, $order);
        }
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

    /**
     * @return array
     */
    public function getOrders(): array
    {
        return $this->orders;
    }


}