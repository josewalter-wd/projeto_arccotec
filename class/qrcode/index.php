<?php

/*
 * PHP QR Code encoder
 *
 * Exemplatory usage
 *
 * PHP QR Code is distributed under LGPL 3
 * Copyright (C) 2010 Dominik Dzienia <deltalab at poczta dot fm>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */

//var_dump($_POST); exit;

/*
 * A CLASSE PRECISA DOS SEGUINTES PARAMENTOS
 * ?data=cotonete&folder=imagem/pasta
 * DATA = INFORMACAO DO QR CODE
 * FOLDER E A PASTA ONDE ELE VAI COLOCAR O ARQUIVO
 */

var_dump('teste'); exit;

//definindo dados
$_POST['data'] = $_GET['data'];
$_POST['level'] = 'M';
$_POST['size'] = '8';

//echo "<h1>PHP QR Code</h1><hr/>";

//set it to writable location, a place for temp generated PNG files
$PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . $_GET['folder'] . DIRECTORY_SEPARATOR;

if(is_dir($_GET['folder'])){
    //html PNG location prefix
    $PNG_WEB_DIR = $_GET['folder'];
}else{
    mkdir($_GET['folder'], 0777);
    //html PNG location prefix
    $PNG_WEB_DIR = $_GET['folder'];
}



include "qrlib.php";

//ofcourse we need rights to create temp dir
if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);


$filename = $PNG_TEMP_DIR . 'qr.png';

//processing form input
//remember to sanitize user input in real-life solution !!!
$errorCorrectionLevel = 'L';
if (isset($_POST['level']) && in_array($_POST['level'], array('L', 'M', 'Q', 'H')))
    $errorCorrectionLevel = $_POST['level'];

$matrixPointSize = 4;
if (isset($_POST['size']))
    $matrixPointSize = min(max((int) $_POST['size'], 1), 10);


if (isset($_POST['data'])) {

    //it's very important!
    if (trim($_POST['data']) == '')
        die('data cannot be empty! <a href="?">back</a>');

    // user data
    $filename = $PNG_TEMP_DIR . 'qr_' . md5($_POST['data'] . '|' . $errorCorrectionLevel . '|' . $matrixPointSize) . '.png';
    QRcode::png($_POST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);
} else {

    //default data
    echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';
    QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);
}

//display generated file
//echo '<img src="' . $PNG_WEB_DIR . basename($filename) . '" /><hr/>';

//config form
/*echo '<form action="index.php" method="post">
        Data:&nbsp;<input name="data" value="' . (isset($_POST['data']) ? htmlspecialchars($_POST['data']) : 'PHP QR Code :)') . '" />&nbsp;
        ECC:&nbsp;<select name="level">
            <option value="L"' . (($errorCorrectionLevel == 'L') ? ' selected' : '') . '>L - smallest</option>
            <option value="M"' . (($errorCorrectionLevel == 'M') ? ' selected' : '') . '>M</option>
            <option value="Q"' . (($errorCorrectionLevel == 'Q') ? ' selected' : '') . '>Q</option>
            <option value="H"' . (($errorCorrectionLevel == 'H') ? ' selected' : '') . '>H - best</option>
        </select>&nbsp;
        Size:&nbsp;<select name="size">';

for ($i = 1; $i <= 10; $i++)
    echo '<option value="' . $i . '"' . (($matrixPointSize == $i) ? ' selected' : '') . '>' . $i . '</option>';

echo '</select>&nbsp;
        <input type="submit" value="GENERATE"></form><hr/>';
*/
// benchmark
//QRtools::timeBenchmark();

