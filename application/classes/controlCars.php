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
            $car += array("sign" => $row['sign']);
            $car += array("id_order" => $row['id_order']);
            $statmentLocation = $this->DBConnect->sendQuery("SELECT * FROM History_locations INNER JOIN Locations on Locations.id_location = History_locations.id_location  WHERE id_rolling_car = " . $row['id_car'] . " ORDER by date DESC LIMIT 1");
            foreach ($statmentLocation->fetchAll() as $rowLocation) {
                $car += array("longitude" => $rowLocation['longitude']);
                $car += array("latitude" => $rowLocation['latitude']);
            }
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