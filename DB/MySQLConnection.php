<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 24.03.2020
 * Time: 14:18
 */

namespace DB;


class MySQLConnection implements IConnection
{
    private $link;
    private $validator;
    public function __construct(array $Settings)
    {
        $this->link=mysqli_connect($Settings["ip"],$Settings["userName"],$Settings["pass"],$Settings["dbName"]);
        $this->validator=new MySQLValidator();
        if(!$this->link){
            echo "Db connectio error " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
    }

    public function getNativeDriver()
    {
        return $this->link;
    }

    public function execQuery(string $SQLSTRING, bool $enableValidate): IResult
    {
        if(empty($SQLSTRING))
            throw new \Exception("Empty sql string");
        if($enableValidate){
            $SQLSTRING=$this->validator->validate($this,$SQLSTRING);
        }

        $res=mysqli_query($this->link,$SQLSTRING);
        if($res!==false){
            return new MySqlResult($res);
        }
        else
            throw new \Exception("Query error");


    }

    public function setValidator(IValidator $validator)
    {
        $this->validator=$validator;
    }


}