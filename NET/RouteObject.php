<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 25.03.2020
 * Time: 14:55
 */

namespace NET;


class RouteObject
{
    private $url;
    private $action;
    private $argList;
    private $method;
    private $dataArg;


    public function __construct($url, $action,$argList,$method)
    {
        $this->url = $url;
        $this->action = $action;
        $this->argList=$argList;
        $this->method=$method;
    }

    public function execRoute($method,$dataArg){
        if(isset($method)){
            if($method!=$this->method){
                throw new \Exception("method exeption");
            }
        }
        return ($this->action)($this->url,$this->method,$this->argList,$dataArg);
    }


}