<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 24.03.2020
 * Time: 14:05
 */

namespace DB;


class ConectionFactory
{
    public static function CreateConection(array $Settings,$driver) : IConnection{
        if($driver=='mySql')
            return new MySQLConnection($Settings);
    }

}