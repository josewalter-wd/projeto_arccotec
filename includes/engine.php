<?php

session_start();
/* engine.php
 * Arquivo necessário para importar classes e instanciar objetos incluido em todos os arquivos
 * WalterDesigner - 21-05-2011
 */

//ini_set("register_globals", "off");

error_reporting(1);

require './includes/anti-injection.php';
require './includes/globais.php';


//verifica se e virtal ou local
if (!is_dir($_SERVER['DOCUMENT_ROOT'] . $globais['projeto'])) {

    //PASTA TEMPORARIA
    $globais['projeto'] = '/';
    $globais['server'] = 'virtual';
}

$globais['root'] = $_SERVER['DOCUMENT_ROOT'] . $globais['projeto'];

//var_dump($globais['root'] . 'class/helpers/config.class.php');
//exit;

if (!is_file($globais['root'] . 'class/helpers/config.class.php')) {
    var_dump('ESTAMOS COM PROBLEMAS PARA INCORPORAR OS ARQUIVOS NO SERVIDOR "' . $globais['server'] . '" - ERR:001');
    exit;
}

include $globais['root'] . 'class/helpers/config.class.php';
include $globais['root'] . 'class/conn1.class.php';
include $globais['root'] . 'class/geraSenha.class.php';
include $globais['root'] . 'class/query.class.php';
include $globais['root'] . 'class/insert.class.php';
include $globais['root'] . 'class/update.class.php';
include $globais['root'] . 'class/delete.class.php';
include $globais['root'] . 'class/fields.class.php';
include $globais['root'] . 'class/upload.class.php';
include $globais['root'] . 'class/functions.class.php';
include $globais['root'] . 'class/canvas/canvas.php';

include $globais['root'] . 'class/createQR.class.php';


//mobile detect
include $globais['root'] . 'class/mobileDetect/Mobile_Detect.php';


//servidor local ou virtual
if ($globais['server'] == 'local') {
    
    $config = new config();
    $conn1 = new conn1($config->server, $config->bank, $config->user, $config->pass);
    $link = $conn1->connect();

} else if ($globais['server'] == 'virtual') {

    include $globais['root'] . 'class/helpers/config_remoto.class.php';
    $config_ = new config_remoto();
    $conn2 = new conn1($config_->server_, $config_->bank_, $config_->user_, $config_->pass_);
    $link = $conn2->connect();
}

$query = new query($link);

$result = mysqli_query($link, "SELECT * FROM tb_banners");

//$delete = new delete($link);

$insert = new insert($link);

//$update = new update($link);

$fields = new fields($link);

$function = new functions($link);

$detect = new Mobile_Detect;



/*
 * DADOS GLOBAIS PROJETOS
 */

$institucional = $query->simpleQuery('tb_institucional', 'id_institucional', 1);
    
    
$meses = array( 1 => 'janeiro', 'fevereiro', 'mar&ccedil;o', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro');
$Dsemana = array('domingo', 'segunda-feira', 'terça-feira', 'quarta-feira', 'quinta-feira', 'sexta-feira', 's&aacute;bado');
    
$numbers = array(1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five');


    /*
     * TIRANDO SESSAO DO TRINDER
     *
    
    if($_SESSION['name']){
        session_unset();
        session_destroy();
    }*/
