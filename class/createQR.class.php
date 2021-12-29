<?php

/* qrCode.class.php
 * Classe para criar qrCode
 * WalterDesigner - 21-07-2018
 */

class createQR {

    public $local;

    public function createQR($data, $folder) {

//definindo dados
        $_POST['data'] = $data;
        $_POST['level'] = 'M';
        $_POST['size'] = '8';

//echo "<h1>PHP QR Code</h1><hr/>";
//set it to writable location, a place for temp generated PNG files
        $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR;

        if (is_dir($folder)) {
            //html PNG location prefix
            $PNG_WEB_DIR = $folder;
        } else {
            mkdir($folder, 0777);
            //html PNG location prefix
            $PNG_WEB_DIR = $folder;
        }

        include "./class/qrcode/qrlib.php";
        

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
        
        $local = explode('..', $filename);
        
        $this->local = '.'.$local[1];
        
    }

}
