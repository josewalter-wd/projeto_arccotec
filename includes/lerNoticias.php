<?php

/*

 */
$local = 'http://rss.home.uol.com.br/index.xml';


if(file_exists($local)) {
    $xml = simplexml_load_file($local);

    var_dump($xml);
}else{
    exit('Falha ao abrir '.$local);
}
