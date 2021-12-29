<?php
error_reporting(2);
session_start();
//require 'includes/globais.php';


//verifica se esta logado
if(empty($_SESSION['uid'])){
    //nao -> formulario de login
    echo "<script>location.href='start/'</script>";
    exit;
}else{
    //sim -> encaminha para o dashboard
    echo "<script>location.href='trinder3/'</script>";
    exit;
}

/* 
 * TEM QUE TER UMA TABELA DE LOGIN QUE REGISTRA OS ACESSOS COM IP
 */

