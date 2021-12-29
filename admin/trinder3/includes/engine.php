<?php

//phpinfo(); exit;

session_start();
//var_dump($_SERVER);
//var_dump($_SESSION);

error_reporting(1);

//->verifica a sessao
if(empty($_SESSION['uid'])){
    echo "<script>location.href='../start'</script>";
    exit;
}

//->desloga em 1800 segundo (30 minutos) ou update session
$atual = time() - 1800;
if($_SESSION['u-time'] < $atual){
    echo '<script>alert("Sua sessao foi expirada por falta de atividade, por gentileza realize um novo login.")</script>';
    echo "<script>location.href='../start'</script>";
    exit;
}else{
    $_SESSION['u-time'] = time();
}

require 'anti-injection.php';
require 'globais.php';

//verifica se e virtal ou local
if (!is_dir($_SERVER['DOCUMENT_ROOT'] . $globais['projeto'])) {

    $globais['projeto'] = '/';
    $globais['server'] = 'virtual';
}

$globais['root'] = $_SERVER['DOCUMENT_ROOT'] . $globais['projeto'];

//var_dump($globais['root']); 
if (!is_file($globais['root'] . 'admin/trinder3/class/helpers/config.class.php')) {
    var_dump('ESTAMOS COM PROBLEMAS PARA INCORPORAR OS ARQUIVOS NO SERVIDOR "' . $globais['server'] . '" - ERR:001');
    exit;
}

include $globais['root'] . 'admin/trinder3/class/helpers/config.class.php';
include $globais['root'] . 'admin/trinder3/class/conn1.class.php';
include $globais['root'] . 'admin/trinder3/class/geraSenha.class.php';
include $globais['root'] . 'admin/trinder3/class/query.class.php';
include $globais['root'] . 'admin/trinder3/class/insert.class.php';
include $globais['root'] . 'admin/trinder3/class/update.class.php';
include $globais['root'] . 'admin/trinder3/class/delete.class.php';
include $globais['root'] . 'admin/trinder3/class/fields.class.php';
include $globais['root'] . 'admin/trinder3/class/upload.class.php';
include $globais['root'] . 'admin/trinder3/class/functions.class.php';
include $globais['root'] . 'admin/trinder3/class/canvas/canvas.php';

//servidor local ou virtual
if ($globais['server'] == 'local') {
    
    $config = new config();
    $conn1 = new conn1($config->server, $config->bank, $config->user, $config->pass);
    $link = $conn1->connect();

} else if ($globais['server'] == 'virtual') {

    include $globais['root'] . 'admin/trinder3/class/helpers/config_remoto.class.php';
    $config_ = new config_remoto();
    $conn2 = new conn1($config_->server_, $config_->bank_, $config_->user_, $config_->pass_);
    $link = $conn2->connect();
}

$query = new query($link);

$delete = new delete($link);

$insert = new insert($link);

$update = new update($link);

$fields = new fields($link);

$function = new functions();


