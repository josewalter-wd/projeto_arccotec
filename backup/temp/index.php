<?php /*
 error_reporting(0);
	include '../class/helpers/config.class.php';
	include '../class/conn1.class.php';
	include '../class/query.class.php';
	
	$config = new config();
	
	$conn1 = new conn1($config->server, $config->bank, $config->user, $config->pass);
	$conn1-> connect();
	$conn1-> setDb();
	
	$query = new query();
	
	$ativo = $query->simpleQuery('tb_trinder2config', 'label_config', 'ativo');

		if($ativo->value_config == '1'){
		
			header('Location: ../');
			
	}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Site n&atilde;o publicado</title>
    <meta name="title" content="" />
    <meta name="keywords" content="" />
    <meta name="description" content="." />
    <link rel="stylesheet" type="text/css" href="estrutur.css" />

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>
<body>
<div style="background-image:url('bg.jpg'); background-repeat:no-repeat; background-position:bottom right; min-height:685px;">
    <div class="pagina">
        <div class="caixa">
            <div class="topo"></div>
            <div class="centro">
                <h1><a href="http://www.walterdesigner.com/" title="Desenvolvimento de sistemas"><img alt="Walter Designer" src="logotipo.png" /></a></h1>
                <p class="aviso"><b id="site"></b><br />Este website ainda n&atilde;o foi publicado.</p>
                <p class="separador">Desenvolvimento de sites e sistemas personalizados.</p>
                <p>Desenvolvemos e entregamos o seu site em apenas 48horas. <br/><br/> 100% Gerenci&aacute;vel! <br/><br/>Ligue agora (13) 99107-7059.</p>
                <!--  --<h2 class="ultimo_item"><a href="http://www.walterdesigner.com/" title="#">walterdesigner.com</a></h2><!--  -->
            </div>
            <div class="rodape"></div>
        </div>
    </div>
	</div>
    <script type="text/javascript" language="javascript">
        var dominio = window.location.hostname;
        dominio = dominio.replace("www.", "");
        document.getElementById("site").innerHTML = dominio;
    </script>
</body>
</html>
