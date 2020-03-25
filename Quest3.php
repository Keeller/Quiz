<?php
/*Разбор html регулярными выражениями некоректная практика, т. к. html является Контекстно-Свободной,
а не регулярно грамматикой и следовательно регулярными выражениями может быть разобрано только некоторое конечное
подмножество языка html. Для парсинга html используют специализированные парсеры xml деревьев. Пример PHPQuery.
*/
function preFound(){

    $html=query("https://ru.kinorium.com/");
    if($html!==false){
        $res=[
            'id'=>[],
            'ru'=>[],
            'en'=>[]

        ];

        if(preg_match_all('/data-id=\"[0-9]+\"/',$html,$res['id'])&&
            preg_match_all('/<\s*h3[^>]*>(.*?)<\/h3>/',$html,$res['ru'])&&
                preg_match_all("/<\s*h4[^>]*>(.*?)<\/h4>/",$html,$res['en'])){
            var_dump($res['id'][0],$res['ru'][0],$res['en'][0]);
        }
        else
            die('err');
    }
}

function query($url){

    $curl=curl_init();
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_URL,$url);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)');
    curl_setopt($curl, CURLOPT_ENCODING ,"");
    $result=curl_exec($curl);

        return $result;
    }


preFound();