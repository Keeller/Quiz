<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 24.03.2020
 * Time: 17:53
 */

namespace DB;


class MySQLValidator implements IValidator
{
    public function validate(IConnection $connection,string $string): string
    {
        if($connection instanceof MySQLConnection)
            return mysqli_real_escape_string($connection->getNativeDriver(),$string);
        else
            throw new \Exception("Unsoported driver");
    }


}