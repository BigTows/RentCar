<?php

/**
 * Created by PhpStorm.
 * User: bigtows
 * Date: 25/04/2017
 * Time: 14:52
 */
class Сatalog
{
    private $DBConnect;
    private $page;
    private $cars = array();

    function __construct($DBConnect, $page, $count)
    {
        $this->DBConnect = $DBConnect;
        $this->page = $page;
        $statment = $this->DBConnect->sendQuery("SELECT * FROM All_cars Limit :page,:count", [
                "page" => ($this->page * $count),
                "count" => $count]
        );
        foreach ($statment->fetchAll() as $row) {
            $car = [];
            $car += array("brand" => $row['brand_name']);
            $car += array("model" => $row['model']);
            $car += array("cost" => $row['cost_per_day']);
            $car += array("description" => $row['description']);
            $car += array("type" => $row['type_transport_name']);
            array_push($this->cars, $car);
        }
    }

    public function getCars(): array
    {
        return $this->cars;
    }

}