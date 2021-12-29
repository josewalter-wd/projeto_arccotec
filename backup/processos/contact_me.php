<?php
/*
 * Processamento de formulario de contato com pedido
 * @author Walter&Lucinha 09/02/2017 v1.0.2
 */
error_reporting(0);

//var_dump($_POST); exit;


//valida dados

if (empty($_POST[nome]) || empty($_POST[telefone]) || $_POST[nome] == 'Nome:' || $_POST[telefone] == 'Telefone:') {
    echo "<script>alert('Campos obrigatorios, NOME E TELEFONE.')</script>";
    echo "<script>history.go(-1)</script>";
    exit;
}


$site = 'arccotec.com.br';       //Site de onde foi disparado e mail.           
$to = $_POST['to'];   //Email de destino dos dados adicionados no formulario.

$nome = htmlentities($_POST['nome']);
$email = htmlentities($_POST['email']);
$telefone = htmlentities($_POST['telefone']);
$assuntoP = htmlentities($_POST['assunto']);
$mensagem = htmlentities($_POST['mensagem']);

$data = htmlentities($_POST['data']);
$hora = htmlentities($_POST['hora']);

//agendamento 
if($_GET['form'] == 'agendamento'){
    
    //var_dump($_POST); exit;
    
    $assunto = "Novo contrato ('$nome') - AGENDAMENTO";
    $message = "
            <html>
            <head>
            <title>Novo contrato ($nome) - AGENDAMENTO</title>
            <meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1' />
            <style></style>
            </head>
            <body>
                <h2>Pre-agendamento - $data as $hora</h2><br />
                <b>Nome:</b> $nome <br /><br />
                <b>Telefone:</b> $telefone <br /><br />
                <b>Mensagem:</b> $mensagem <br /><br />
            </body>
            </html>";

    //var_dump($assunto); var_dump($message); exit;
    
//contato express
}elseif($_GET['form'] == 'contato-e'){
    
    $assunto = 'Mensagem enviada ("' . $_POST['nome'] . '") - Contato Express';
    $message = "
	<html>
	<head>
	
	<title>Mensagem enviada pelo site ($nome) - Contato</title>
	<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1' />
	<style></style>
	</head>
	<body>
            <h2>Mensagem enviada pelo site ($site)</h2><br />
            <b>Nome:</b> $nome <br /><br />
            <b>Telefone:</b> $telefone <br /><br />
            <b>Mensagem:</b> $mensagem <br /><br />
	</body>
	</html>";
    
    //var_dump($assunto); var_dump($message); exit;
    
//contato completo
}elseif($_GET['form'] == 'contato'){
    
    $assunto = 'Mensagem enviada ("' . $_POST['nome'] . '") - Contato';
    $message = "
	<html>
	<head>
	
	<title>Mensagem enviada pelo site ($nome) - Contato</title>
	<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1' />
	<style></style>
	</head>
	<body>
            <h2>$assuntoP</h2><br />
            <b>Nome:</b> $nome <br /><br />
            <b>Email:</b> $email <br /><br />
            <b>Telefone:</b> $telefone <br /><br />
            <b>Mensagem:</b> $mensagem <br /><br />
	</body>
	</html>";
    
    //var_dump($assunto); var_dump($message); exit;
    
}

//var_dump($_POST); exit;
//echo $message; exit;
//******* Enviar E-mail ********///

$subject = mb_encode_mimeheader($assunto, "ISO-8859-1");    // Assunto do e-mail

$headers .= "From: " . $to . " \r\n";                       //Email de sua hospedagem
//$headers .= "Cc:  email@domio.com.br \r\n";											//Caso você não for usar uma variável adicione o e-mail diretametne.
//$headers .= "Cc:  $email \r\n";                             //Uma cópia dos dados será enviado para o próprio usuario do formulario
//$headers .= "Bcc: email2@domio.com.br \r\n";											// Bcc

$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1 \r\n";


if (mail($to, $subject, $message, $headers)) {
    echo "<script>alert('Sua mensagem foi enviada com sucesso, em breve responderemos!')</script>";
    echo "<script>location.href='../'</script>";
} else {
    echo "<script>alert('Sua mensagem foi enviada com sucesso, em breve responderemos!!!')</script>";
    echo "<script>location.href='../'</script>";
    
    //echo "<script>alert('Sua mensagem nao foi enviada, tente novamente.')</script>";
    //echo "<script>history.go(-1)</script>";
}
