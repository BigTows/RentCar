<?php

/**
 * Created by PhpStorm.
 * User: bigtows
 * Date: 13/03/2017
 * Time: 22:14
 */

/**
 * Class Response
 * @version 0.2 Beta
 *
 */
class Response
{
    private $fullMess;
    private $shortMess;
    /**
     * @var int Level response
     * Levels:
     * 0 - It's Good
     * 1 - Warning
     * 2 - Error
     */
    private $level;
    private $responseArray=[];
    private $data = [];
    function __construct($shortMess, $fullMess = "",$data=[], $level = 0)
    {
        $this->shortMess = $shortMess;
        $this->fullMess = $fullMess;
        $this->level = $level;
        $this->data = $data;
        $this->parse();
    }
    public function execute(){
        echo json_encode($this->responseArray,JSON_UNESCAPED_UNICODE);
    }

    private function parse(){
        $this->responseArray =["level" => $this->level,
        "messages"=>[
            "short"=> $this->shortMess,
            "full"=>$this->fullMess
        ], "data"=>$this->data];
    }
}