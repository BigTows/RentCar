<?php
$rootPath = $_SERVER['DOCUMENT_ROOT']."/cars/";
require $rootPath.'application/configs/project.config.php';
if (DEBUG_MODE){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
class DataBase{
    private $DBConnect;
    private $debug = true;
    private $hasError = false;
    function __construct($dns,$user,$password=""){
        try {
            $this->DBConnect = new PDO($dns, $user, $password);
        }catch (PDOException $exception){
           $this->log($exception);
        }
    }

    public function sendQuery($SQL,$Array=[]){
            $statement = $this->DBConnect->prepare($SQL);
            foreach ($Array as $key => $item) {
                $statement->bindValue(":" . $key, $item);
                $this->log("Bind :" . $key . " " . $item . "<br>");
            }
            $statement->execute();
            if ($statement->errorCode()==0){
                $this->hasError=false;

            } else {
                $this->hasError=true;
            }
            return $statement;
    }

    public function test(){
        echo "yeap";
    }

    public function hasError(){
        return $this->hasError;
    }

    public function setDebug($status){
        $this->debug=$status;
    }
    private function log($message){
        if (DEBUG_MODE && $this->debug) echo "Class DataBase -> ".$message;
    }
}

?>