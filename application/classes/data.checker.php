<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . "/cars/";
require_once $rootPath . 'application/util/messages.php';

class ValidData
{
    protected $DBConnect;
    protected $valid = true;
    protected $reason = [];

    function __construct($DBConnect)
    {
        $this->DBConnect = $DBConnect;
    }

    public function getMessage()
    {
        $returnMessages = "";
        foreach ($this->reason as $item) {
            $returnMessages = $returnMessages . $item . " ";
        }
        return $returnMessages;
    }

    protected function changeValid($typeData, $bool)
    {
        // if bad input data and Now data set is valid
        if ($this->valid && !$bool) {
            global $messages;
            array_push($this->reason, $messages["BAD_" . strtoupper($typeData)]);
            $this->valid = $bool;
        }
    }

    public function getValid()
    {
        return $this->valid;
    }

}

class RegistrationData extends ValidData
{


    function __construct($DBConnect, $arrayData)
    {
        parent::__construct($DBConnect);
        $this->changeValid("email", $this->checkUnique("email", $arrayData["email"]));
        $this->changeValid("phone", $this->checkUnique("phone", $arrayData["phone"]));
        $this->changeValid("login", $this->checkUnique("login", $arrayData["login"]));
        $this->changeValid("passport", $this->checkUnique("passport", $arrayData["passport"]));

    }

    private function checkUnique($nameRow, $data)
    {
        return !$this->DBConnect->sendQuery("SELECT " . $nameRow . " FROM Users WHERE " . $nameRow . "=:" . $nameRow, [$nameRow => $data])->rowCount();
    }

}

