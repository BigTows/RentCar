<?php

/**
 * Created by PhpStorm.
 * User: bigtows
 * Date: 26/04/2017
 * Time: 10:26
 */
class ControlCars
{
    private $DBConnect;
    private $cars = array();

    function __construct($DBConnect, $user)
    {
        if (!$user->havePerm("view_control_cars")) return;
        $this->DBConnect = $DBConnect;
        $statment = $this->DBConnect->sendQuery("SELECT * FROM Control_cars");
        foreach ($statment->fetchAll() as $row) {
            $car = [];
            $car += array("brand" => $row['brand']);
            $car += array("model" => $row['model']);
            $car += array("id_status" => $row['id_status']);
            $car += array("status" => $row['status']);
            $car += array("id_car" => $row['id_car']);
            $car += array("id_user" => $row['id_user']);
            $car += array("first_name" => $row['first_name']);
            $car += array("second_name" => $row['second_name']);
            $car += array("phone" => $row['phone']);
            $car += array("date_begin" => $row['date_begin']);
            $car += array("date_end" => $row['date_end']);
            $car += array("arrears" => $row['arrears']);
            array_push($this->cars, $car);
        }
    }

    /**
     * @return array
     */
    public function getCars(): array
    {
        return $this->cars;
    }

}