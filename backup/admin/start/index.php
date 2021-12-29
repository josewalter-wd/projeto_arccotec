<?php 
    include '../trinder3/includes/globais.php';
    session_start(); session_unset(); session_destroy();
    
?>
<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>..:: Trinder Administrator - Versão <?php echo $globais['trinderVersion']; ?> ::..</title>
        <link rel="stylesheet" href="css/reset.css">

        <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
        <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="css/style.css">

    </head>

    <body>
        
        <div class="container">
            <div class="info">
                <h1>Trinder Administrator</h1><span>Desenvolvido por <a href="#">WalterDesigner</a></span>
            </div>
        </div>
        <div class="form">
            <div class="thumbnail"><img src="images/trinder-logo.png"/></div>
            <form class="register-form" action="../log/index.php?log=forgot" method="POST">
                <input type="text" placeholder="Seu nome"/>
                <input type="text" placeholder="Email"/>
                <input type="text" placeholder="CPF"/>
                <button>Reculperar a minha senha</button>
                <p class="message"><a href="#">Voltar ao login</a></p>
            </form>
            <form class="login-form" action="../log/index.php?log=login" method="POST">
                <input type="email" name="email" placeholder="Seu email"/>
                <input type="password" name="password" placeholder="Senha"/>
                <button>Acessar Painel</button>
                <p class="message"><a href="#">Esqueci minha senha</a></p>
            </form>
        </div>
        
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        
        <script src="js/index.js"></script>
        
    </body>
</html>
