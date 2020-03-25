<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 24.03.2020
 * Time: 17:44
 */

namespace DB;


interface IResult
{
    public function fetch():array;
}