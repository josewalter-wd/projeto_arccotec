<?php

session_start();

/*
 * MOTOR DE LOGIN E LOGOUT E RECULPERAR SENHA
 */

error_reporting(0);

require '../../globais.php';
require '../../anti-injection.php';

//verifica se e virtal ou local
if (!is_dir($_SERVER['DOCUMENT_ROOT'] . $globais['projeto'])) {

    $globais['projeto'] = '/';
    $globais['server'] = 'virtual';
}

$globais['root'] = $_SERVER['DOCUMENT_ROOT'] . $globais['projeto'];



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

//var_dump($_POST); exit;
// -> upload
// -> pasta na raiz do sistema para upload temporario
$mainFolder = '../../../../../_FILES/';
//cria a pasta se nao existir
if (!file_exists($mainFolder)) {
    mkdir($mainFolder, 0777);
}

//faz o upload dos arquivos
$upload = new upload($mainFolder, $_FILES);


//verifica se tem upload
if ($upload->result != null) {

//pegar as imagens redimencionar e colocar na pasta correspondente
    foreach ($upload->result as $key => $value) {

        //verifica se e imagem para redimencionar
        if (strstr($key, 'imagem')) {

            //abrir a imagem
            $canvas = new canvas($mainFolder . $value['name']);

            //cor do fundo
            $canvas->set_rgb('#FFF');

            //pesquisa para saber a dimensao da imagem        
            $field = $fields->simpleFields('tb_' . $_GET['m']);
            $dimensao = explode('x', $field[$key]['Default']);

            //redimencionar sem distorcer
            $canvas->resize($dimensao[0], $dimensao[1], "fill");

            //espelhar
            //$canvas->flip("horizontal");
            //girar
            //$canvas->rotate("90");

            /* texto
              $options = array(
              "color" => "#d3d3d3",
              //"background_color" => "#FFF",
              "size" => 15,
              "x" => 260,
              "y" => 5,
              "truetype" => true,
              "font" => $globais['root']."fonts/verdana.ttf",
              );
              $canvas->text($globais['dominio'], $options);
             */

            //filtros
            //$canvas->filter("grayscale");
            //qualidade
            $canvas->set_quality(100);

            //marca d'agua busca
            //$logo = $query->simpleQuery('tb_institucional', 'id_institucional', '1');
            //$canvas->merge($globais['root'] . "images/institucional/p_marca.png", array("left", "bottom"));

            $imageFolder = '../../../../../images/' . $_GET['m'] . '/';
            //cria a pasta se nao existir
            if (!file_exists($imageFolder)) {
                mkdir('../../../../../images/', 0777);
                mkdir($imageFolder, 0777);
            }

            //salvar
            $canvas->save($imageFolder . $value['name']);
        }

        $_POST[$key] = $value['name'];
    }
}

//dados
$module = $aba[$inKey]['module'];
$tab = $aba[$inKey]['aba'];

//cadastrar
if ($_GET['c'] == 'cadastrar') {

    //var_dump($_POST); exit;

    if ($insert->simpleInsert('tb_' . $_GET['m'], $_POST)) {
        //echo "<script>alert('Cadastro realizado com sucesso!')</script>";
        //registrando na tabela de logs
        $cont = array(
            'id_update' => 0,
            'description_update' => $_SESSION['name'] . ' - Inser&ccedil;&atilde;o realizada no m&oacute;dulo "' . strtoupper($_GET['m']) . '".',
            'type_update' => 'INS',
        );
        $insert->simpleInsert('trinder3_updates', $cont);
        
        echo "<script>location.href='CRUD.php?c=true&m=" . $_GET['m'] . "'</script>";
        exit;
    } else {
        echo "<script>alert('Nao foi possivel realizar o cadastro, por favor tente novamente.')</script>";
        echo "<script>history.go(-1)</script>";
        exit;
    }

//alterar
} elseif ($_GET['a'] > 0) {

    //var_dump($_POST); exit;

    if ($update->simpleUpdate('tb_' . $_GET['m'], $_POST, $_GET['id'], $_GET['a'])) {
        // echo "<script>alert('Alteracao realizada com sucesso!')</script>";
        //registrando na tabela de logs
        $cont = array(
            'id_update' => 0,
            'description_update' => $_SESSION['name'] . ' - Altera&ccedil;&atilde;o realizada no m&oacute;dulo "' . strtoupper($_GET['m']) . '".',
            'type_update' => 'UPD',
        );
        $insert->simpleInsert('trinder3_updates', $cont);
        
        echo "<script>location.href='../../../MODULE.php?m=" . $_GET['m'] . "&p=LIST&a=true'</script>";
        
        exit;
    } else {
        echo "<script>alert('Nao foi possivel realizar a alteracao, por favor tente novamente.')</script>";
        echo "<script>history.go(-1)</script>";
        exit;
    }
}

//excluir
if ($_GET['delete']) {

    //var_dump($_GET); exit;

    if ($delete->totalDelete('tb_' . $_GET['m'], $_GET['id'], $_GET['delete'])) {
        //echo "<script>alert('Exclusao realizada com sucesso!')</script>";
        //registrando na tabela de logs
        $cont = array(
            'id_update' => 0,
            'description_update' => $_SESSION['name'] . ' - Exclus&atilde;o realizada no m&oacute;dulo "' . strtoupper($_GET['m']) . '".',
            'type_update' => 'DEL',
        );
        $trinderUpdates = new insert('trinder3_updates', $cont);

        echo "<script>location.href='LIST.php?d=true&m=" . $_GET['m'] . "'</script>";
        exit;
    } else {

        echo "<script>alert('Nao foi possivel realizar a exclusao, por favor tente novamente.')</script>";
        echo "<script>history.go(-1)</script>";
    }
}

echo "<script>alert('Nao foi possivel processar seu pedido, por favor tente novamente.')</script>";
echo "<script>history.go(-1)</script>";
exit;

