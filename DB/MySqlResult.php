<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 24.03.2020
 * Time: 17:49
 */

namespace DB;


class MySqlResult implements IResult
{
   private $rawObject;

    public function __construct($rawObject){
        $this->rawObject=$rawObject;
    }

    public function fetch(): array
    {
        $res=[];
        while ($row=mysqli_fetch_assoc($this->rawObject)){
            array_push($res,$row);
        }
        return $res;
    }


}