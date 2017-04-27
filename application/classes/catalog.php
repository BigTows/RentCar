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
    private $count = 0;
    private $cars = array();
    private $countCars = 0;

    function __construct($DBConnect, $page, $count)
    {
        $this->DBConnect = $DBConnect;
        $this->page = $page;
        $statement = $this->DBConnect->sendQuery("SELECT * FROM All_cars Limit :page,:count", [
            "page" => ($this->page - 1) * $count,
            "count" => $count], PDO::PARAM_INT
        );
        $this->count=$count;
        foreach ($statement->fetchAll() as $row) {
            $car = [];
            $car += array("brand" => $row['brand_name']);
            $car += array("model" => $row['model']);
            $car += array("cost" => $row['cost_per_day']);
            $car += array("description" => $row['description']);
            $car += array("type" => $row['type_transport_name']);
            array_push($this->cars, $car);
        }
        $statement = $this->DBConnect->sendQuery("SELECT Count(*) as count FROM All_cars ");
        $this->countCars = $statement->fetch()['count'];
    }

    public function getCars(): array
    {
        return $this->cars;
    }

    /**
     * @return int
     */
    public function getCountCars():int
    {
        return $this->countCars/$this->count;
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

}