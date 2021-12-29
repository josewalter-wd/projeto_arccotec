<?php

session_start();

/*
 * MOTOR DE LOGIN E LOGOUT E RECULPERAR SENHA
 */

//error_reporting(0);

include '../trinder3/includes/globais.php';

//verifica se e virtal ou local
if (!is_dir($_SERVER['DOCUMENT_ROOT'] . $globais['projeto'])) {

    $globais['projeto'] = '/NOVO-SITE/';
    $globais['server'] = 'virtual';
}

$globais['root'] = $_SERVER['DOCUMENT_ROOT'] . $globais['projeto'];

require '../trinder3/includes/anti-injection.php';

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

//exit;
//->login
if ($_GET['log'] == 'login') {

    //->verifica formulario vazio
    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo '<script>alert("Atencao! Todos os campos sao de preenchimento obrigatorio. Por favor tente novamente.")</script>';
        echo '<script>history.go(-1)</script>';
        exit;
    }

    //->verifica se email cadastrado
    $user = $query->simpleQuery('trinder3_users', 'user_user', $_POST['email']);
    
    if ($_POST['email'] != $user->user_user) {
        echo '<script>alert("Atencao! Usuario nao cadastrado, favor verificar o seu email ou entre em contato com o suporte informando o codigo - ERR:002")</script>';
        echo '<script>history.go(-1)</script>';
        exit;
    }

    //->verifica se senha confere
    if (md5($_POST['password']) != $user->pass_user) {
        echo '<script>alert("Atencao! A senha informada nao confere com a cadastrada, tente novamente ou entre em contato com o suporte informando o codigo - ERR:003")</script>';
        echo '<script>history.go(-1)</script>';
        exit;
    }

    //var_dump($user); exit;
    //->tudo ok registra login
    $array = array('id_login' => 0,'id_user' => $user->id_user);
    //$insert->simpleInsert('trinder3_login', $array);

    //->persiste na sessao
    $login = $query->simpleQuery('trinder3_login', 'id_login', $insert->id);
    $_SESSION['uid'] = md5($login->dtInsert_login);
    $_SESSION['name'] = $user->label_user;
    $_SESSION['u-time'] = time();

    //->encaminha
    echo "<script>location.href='../trinder3'</script>";
    exit;

//->logout
} else if ($_GET['log'] == 'logout') {

    session_unset();
    session_destroy();
    echo '<script>alert("Agradecemos por utilizar o Trinder3, nos envie sua avaliacao ou entre em contato com o suporte para mais informacoes.")</script>';
    echo "<script>location.href='../start'</script>";
    exit;

//->forgot
} else if ($_GET['log'] == 'forgot') {

    //echo 'esqueceu senha';
    echo "<script>location.href='../start'</script>";
    exit;
} else {
    echo "<script>location.href='../start'</script>";
    exit;
}

