<?php
//gerar certificado
//criar QRCODE
$qrCode = new createQR('http://www.arccotec.com.br/certificado.php?cod='.$_GET['cod'], '../images/certificados/qrCode');
//echo $qrCode->local; exit;

//preparando dados
$_GET['cod'] = strtoupper($_GET['cod']);
$CNPJ = (string) $institucional->CNPJ_institucional;
$CPFouCNPJ = (string) $certific->CPFouCNPJ_certificado;
//var_dump($CNPJ);exit;

$validade = explode(' ', $certific->validade_certificado);
$val = explode('-', $validade[0]);


//gerar PDF
// Include autoloader
require_once './class/domPDF/autoload.inc.php';

// Reference the Dompdf namespace
use Dompdf\Dompdf;

// Instantiate and use the dompdf class
$dompdf = new Dompdf();

// Load HTML content
$dompdf->loadHtml('
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Certificado Arccotec</title>
  <meta name="generator" content="Google Web Designer 4.0.1.0625">
  <style type="text/css" id="gwd-text-style">
    p {
      margin: 0px;
    }
    h1 {
      margin: 0px;
    }
    h2 {
      margin: 0px;
    }
    h3 {
      margin: 0px;
    }
  </style>
  <style type="text/css">
    html, body {
      width: 100%;
      height: 100%;
      margin: 0px;
      background-image: url("./images/certificados/bg-certificado.png");
      background-size: 100%;
    }
    body {
      background-color: white;
      transform: perspective(1400px) matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
      transform-style: preserve-3d;
    }
    .gwd-p-180f {
      position: absolute;
      font-family: Verdana;
      font-size: 60px;
      width: 958px;
      transform-origin: 453.485px 116.254px 0px;
      height: 69px;
      left: 92px;
      top: 130px;
    }
    .gwd-p-1oox {
      position: absolute;
      font-family: Verdana;
      font-size: 20px;
      text-align: center;
      left: 95px;
      top: 240px;
      width: 958px;
    }
    .gwd-p-1ooy {
      position: absolute;
      font-family: Verdana;
      font-size: 20px;
      text-align: center;
      left: 840px;
      top: 500px;
      border:1px solid #d3d3d3;
      padding:6px;
      background-color: white;
    }
    .gwd-p-1ooz {
      position: absolute;
      font-family: Verdana;
      font-size: 20px;
      text-align: left;
      left: 90px;
      top: 500px;
      border:1px solid #d3d3d3;;
      padding:10px;
      width:700px;
      background-color: white;
    }
    span{
      font-family: Verdana;
      font-size: 30px;
      font-style: italic;
    }
    img{
      width:200px;
      height:200px;
    }
  </style>
</head>

<body class="htmlNoPages">
  <p class="gwd-p-180f">CERTIFICADO DE HIGIENIZAÇÃO</p>
  <p class="gwd-p-1oox">Certificamos que o(s) equipamento(s) de climatização de ambiente localizado(s) na(o)<br>
    <b>'.$certific->nomeEmpresa_certificado.', CPF/CNPJ: '.$CPFouCNPJ.', Endereço: '.$certific->enderecoCliente_certificado.'</b><br>
    foram submetidos a limpeza e higienizaçao pela empresa <b>'.strtoupper($institucional->nome_institucional).', CNPJ: '.$CNPJ.'<br>
    Endereço: '.$institucional->endereco_institucional.'.</b> Garantindo assim a performace e protegendo a saúde<br>
    dos usuarios deste(s) ambiente(s).<br>
    <br>
    <span>Código <b>'.$_GET['cod'].'</span>
    <br>
    <br>
    O prazo de garantia, em condições normais de utilização dos equipamentos, esta vinculado a validade deste certificado.<br>
    <br>
  </p>
  
  <p class="gwd-p-1ooz">
    Emitido em, '.$certific->emissao_certificado.'. <red>Valido até  <b>'.$val[2]."/".$val[1]."/".$val[0].'</b></red><br>
    <br>
        Serviço executado por:<b>'.$certific->tecnico_certificado.'</b><br>
    <br>
        Produtos utilizados:<b>'.$certific->produtosUtilizados_certificado.'</b><br>
    <br>
        Equipamentos:<b>'.$certific->equipamentosCliente_certificado.'</b><br>
    <br>
    
  </p>
  <p class="gwd-p-1ooy">
    <img src="'.$qrCode->local.'">
  </p>
  
</body>

</html>    
');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();