<?php
require_once "C:\\ops\\OSPanel\\domains\\resumeTest\\vendor\\autoload.php";
define("MYSQL", 'mySql');
$app=new \NET\Router();
// t1 и t2 адреса для запросов по заданию
$app->addRoute("t1",
    function (string $url,string $method,$dataArg){
        $db=\DB\ConectionFactory::CreateConection(['ip'=>'127.0.0.1','userName'=>'root','pass'=>'','dbName'=>'sobes'],MYSQL);
        $result=$db->execQuery("SELECT * FROM movie WHERE NOT EXISTS(SELECT * FROM pictures WHERE (pictures.movie_id=movie.movie_id)) limit 10;",false);
        //var_dump($result->fetch());
        return json_encode($result->fetch());

},null,'GET');

$app->addRoute("t2",
    function (string $url,string $method,$dataArg){
        $db=\DB\ConectionFactory::CreateConection(['ip'=>'127.0.0.1','userName'=>'root','pass'=>'','dbName'=>'sobes'],MYSQL);
        $result=$db->execQuery("SELECT COUNT(*) FROM (SELECT * FROM movie WHERE NOT EXISTS(SELECT * FROM pictures WHERE (pictures.movie_id=movie.movie_id))) as t;",false);
        return json_encode($result->fetch());

    },null,'GET');

$app->addRoute("t3",
    function (string $url,string $method,$dataArg){
        $db=\DB\ConectionFactory::CreateConection(['ip'=>'127.0.0.1','userName'=>'root','pass'=>'','dbName'=>'sobes'],MYSQL);
        $result=$db->execQuery("SELECT movie.movie_id,movie.title FROM pictures LEFT JOIN movie ON (pictures.movie_id=movie.movie_id);",false);

        return json_encode($result->fetch());

    },null,'GET');

header('Content-Type: application/json');
echo $app->route();