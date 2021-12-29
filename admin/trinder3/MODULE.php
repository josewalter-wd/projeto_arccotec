<?php

/*
 * ARQUIVO PARA INCLUIR MODULOS ADICIONAIS
 * Exemplos em './includes/extra-modules/exemplo/'
 * WalterDesigner 20/01/2017
 */
error_reporting(2);
//LIST
if ($_GET['p'] == 'LIST') {
    
    if (include './includes/adicional_module/' . $_GET['m'] . '/LIST.php') {
        // include realizado com sucesso
    } else {
        echo "<script>location.href='index.php'</script>";
        exit;
    }

///CRUD
} else if ($_GET['p'] == 'CRUD') {
    if (include './includes/adicional_module/' . $_GET['m'] . '/CRUD.php') {
        // include realizado com sucesso
    } else {
        echo "<script>location.href='index.php'</script>";
        exit;
    }
} else {
    if (include './includes/adicional_module/' . $_GET['m'] . '/CRUD.php') {
        // include realizado com sucesso
    } else {
        echo "<script>location.href='index.php'</script>";
        exit;
    }
}

