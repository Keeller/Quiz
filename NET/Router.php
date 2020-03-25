<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 25.03.2020
 * Time: 15:00
 */

namespace NET;


class Router
{
   private $RouteList=[];

    protected function getFormData($method) {

        if ($method === 'GET') return $_GET;
        if ($method === 'POST') return $_POST;
        $data = array();
        $exploded = explode('&', file_get_contents('php://input'));

        foreach($exploded as $pair) {
            $item = explode('=', $pair);
            if (count($item) == 2) {
                $data[urldecode($item[0])] = urldecode($item[1]);
            }
        }

        return $data;
    }

    public function route(){
        $method = $_SERVER['REQUEST_METHOD'];
        $data=$this->getFormData($method);
        $url = (isset($_GET['q'])) ? $_GET['q'] : '';
        $url = rtrim($url, '/');
        //var_dump($_GET['q']);die();
        $urls = explode('/', $url);
        if(isset($this->RouteList[$url])){
            try {
                return ($this->RouteList[$url])->execRoute($method,$data);
            }
            catch (\Exception $ex){
                return $ex->getMessage();
            }
        }
        else
            return 'Route not found';
    }

    public  function addRoute($url, $action,$argList,$method){
        $this->RouteList[$url]=new RouteObject($url,$action,$argList,$method);
    }

}