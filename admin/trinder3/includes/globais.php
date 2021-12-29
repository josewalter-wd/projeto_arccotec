<?php

//local ou virtual
$globais['server'] = 'local';

$globais['dominio'] = 'www.arccotec.com.br';
$globais['nomeEmpresa'] = 'ArccoTec';
$globais['projeto'] = '/projeto_arcotec/';
$globais['trinderVersion'] = '3.0.4';

//verifica se e virtal ou local
if(!is_dir($_SERVER['DOCUMENT_ROOT'] . $globais['projeto'])){
    
   $globais['projeto'] = '/';
   $globais['server'] = 'virtual';
    
}

$globais['root'] = $_SERVER['DOCUMENT_ROOT'] . $globais['projeto'];

