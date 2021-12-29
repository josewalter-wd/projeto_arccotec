<?php


require 'includes/engine.php';

//var_dump($_POST); exit;
// -> upload
// -> pasta na raiz do sistema para upload temporario
$mainFolder = '../../_FILES/';
//cria a pasta se nao existir
if (!file_exists($mainFolder)) {
    mkdir($mainFolder, 0777);
}

//faz o upload dos arquivos
$upload = new upload($mainFolder, $_FILES);

//var_dump($upload->result);exit;


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

            $imageFolder = '../../images/' . $_GET['m'] . '/';
            //cria a pasta se nao existir
            if (!file_exists($imageFolder)) {
                mkdir('../../images/', 0777);
                mkdir($imageFolder, 0777);
            }

            //salvar
            $canvas->save($imageFolder . $value['name']);
        }

        $_POST[$key] = $value['name'];
    }
}



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
        
        echo "<script>location.href='LIST.php?a=true&m=" . $_GET['m'] . "'</script>";
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
        $insert->simpleInsert('trinder3_updates', $cont);

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

