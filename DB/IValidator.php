<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 24.03.2020
 * Time: 17:33
 */

namespace DB;


interface IValidator
{

    public function validate(IConnection $connect,string $string):string ;

}