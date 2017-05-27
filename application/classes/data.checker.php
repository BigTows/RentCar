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
        $this->changeValid("email", $this->checkEmail( $arrayData["email"]));
        $this->changeValid("phone", $this->checkLength( $arrayData["phone"],11,11));
        $this->changeValid("login", $this->checkUserName($arrayData["login"]));
        $this->changeValid("passport", $this->checkLength($arrayData["passport"],10,10));
        $this->changeValid("firstName", $this->checkPersonalName($arrayData["firstName"]));
        $this->changeValid("secondName", $this->checkPersonalName($arrayData["secondName"]));
        $this->changeValid("password", $this->checkLength($arrayData["password"],6));


        $this->changeValid("email", $this->checkUnique("email", $arrayData["email"]));
        $this->changeValid("phone", $this->checkUnique("phone", $arrayData["phone"]));
        $this->changeValid("login", $this->checkUnique("login", $arrayData["login"]));
        $this->changeValid("passport", $this->checkUnique("passport", $arrayData["passport"]));

    }

    private function checkUnique($nameRow, $data)
    {
        if(!$this->getValid()) return false;
        return !$this->DBConnect->sendQuery("SELECT " . $nameRow . " FROM Users WHERE " . $nameRow . "=:" . $nameRow, [$nameRow => $data])->rowCount();

    }

    private function checkLength($data,$min=-1,$max=-1){
        if(!$this->getValid()) return false;
        $pattern = '/^[0-9]';
        if ($min!=-1) $pattern=$pattern.'{'.$min;
        if ($max!=-1) $pattern=$pattern.','.$max.'}'; else $pattern=$pattern.'}';
        $pattern=$pattern."+$/";
        return preg_match($pattern, $data);
    }

    private function checkPassport($passport) {
        if(!$this->getValid()) return false;
        return preg_match('/^[0-9]{10}+$/', $passport);
    }
    private function checkEmail($email){
        if(!$this->getValid()) return false;
        return preg_match('/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/', $email);
    }

    private function checkUserName($userName){
        if(!$this->getValid()) return false;
        return preg_match("/^[a-z0-9_-]{3,16}$/",strtolower($userName));
    }
    private function checkPersonalName($name){
        if(!$this->getValid()) return false;
        return preg_match('/^[a-zA-Zа-яёА-ЯЁ\s\-]{2,999}+$/u', $name);
    }

}

