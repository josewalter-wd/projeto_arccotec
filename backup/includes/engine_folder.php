<?php
session_start();
/* engine.php
 * Arquivo necessário para importar classes e instanciar objetos incluido em todos os arquivos
 * WalterDesigner - 21-05-2011
 */
//ini_set("register_globals", "off");

error_reporting(3);

require '../includes/anti-injection.php';
require '../includes/globais.php';

//verifica se e virtal ou local
if (!is_dir($_SERVER['DOCUMENT_ROOT'] . $globais['projeto'])) {

    $globais['projeto'] = '/';
    $globais['server'] = 'virtual';
}

$globais['root'] = $_SERVER['DOCUMENT_ROOT'] . $globais['projeto'];


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

//$delete = new delete($link);

$insert = new insert($link);

//$update = new update($link);

$fields = new fields($link);

$function = new functions();
