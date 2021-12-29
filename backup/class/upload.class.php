<?php

class upload {

    public $tipos = array('.jpeg', '.jpg', '.png', '.tif', '.pdf', '.swf', '.gif');
    public $compact = array('.zip');
    public $qnt = 0;
    public $result;

    public function __construct($folder, $files) {

        /*
         * O INPUT CORRETO E <input type="file" name="arquivo[CAMPO_TABELA]" />
         * ONDE CAMPO TABELA E ONDE SERÁ GRAVADO ONOME DO ARQUIVO
         * ***** NUNCA TIRAR O NOME arquivo[] DO INPUT *****
         * 
         * classe vai pegar renomear os arquivos colocar na files retornar a extencao do arquivo
         * 
         */
        //quantidade de arquivos
        $this->qnt = count($files['arquivo']['name']);

        foreach ($files['arquivo']['name'] as $key => $value) {
            
            if ($files['arquivo']['error'][$key] == 0) {

                //pega extensao
                $ext = strrchr($value, '.');
                
                //validar extencao
                if (in_array($ext, $this->tipos) || in_array($ext, $this->compact)) {

                    //datacompleta
                    $data = preg_replace('/[^a-z0-9]/i', '-', date('c'));
                    
                    //cod aleatorio
                    $aleat = new geraSenha(8, false, true, false);
                    
                    //nome do arquivo limpo
                    //  retira extencao
                    $name = str_replace($ext, '', $value);
                    //retorno
                    $label = $name;
                    //  retira especiais
                    $string = $name;
                    $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
                    $b = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';	
                    $string = utf8_decode($string);
                    $string = strtr($string, utf8_decode($a), $b);
                    $string = strip_tags(trim($string));
                    $string = str_replace(" ","-",$string);
                    $string = str_replace(array("-----","----","---","--"),"-",$string);
                    
                    $name = strtolower(utf8_encode($string));
                    
                    
                    if (in_array($ext, $this->compact)) {
                        //pasta descompactada
                        $name = $data . '_' . $aleat->codigo . '_' . $name;
                        mkdir($folder . $name, 0777);

                        //extraindo o zip
                        $zip = new ZipArchive;
                        $zip->open($_FILES["arquivo"]["tmp_name"][$key]);
                        $zip->extractTo($folder . $name);
                        $zip->close();
                    } else {

                        //arquivo
                        $name = $data . '_' . $aleat->codigo . '_' . $name . $ext;
                        move_uploaded_file($_FILES["arquivo"]["tmp_name"][$key], "$folder/$name");
                        
                    }

                    $retorno[$key] = array(
                        'label' => $label,
                        'ext' => $ext,
                        'name' => $name,
                    );
                } else {
                    //extencao invalida
                    $retorno[$key] = false;
                    $this->result = $retorno[$key];
                }

                $this->result = $retorno;
            }
        }
    }

}
