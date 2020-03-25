<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 24.03.2020
 * Time: 14:03
 */

namespace DB;


interface IConnection
{
    public function getNativeDriver();
    public function execQuery(string $SQLSTRING,bool $enableValidate):IResult;
    public function setValidator(IValidator $validator);

}