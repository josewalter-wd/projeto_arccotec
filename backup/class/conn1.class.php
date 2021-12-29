<?php

/* config.class.php
 * Classe de conexao com banco de dados Mysql 5.1.53
 * WalterDesigner - 21-05-2011
 * 03-08-17 -> ALTERADO mysqli
 */

class conn1 {

    private $server_;
    private $bank_;
    private $user_;
    private $pass_;
    private $con;

    function __construct($server, $bank, $user, $pass) {
        $this->server_ = $server;
        $this->bank_ = $bank;
        $this->user_ = $user;
        $this->pass_ = $pass;
    }

    public function connect() {

        $this->con = mysqli_connect($this->server_, $this->user_, $this->pass_, $this->bank_) or die("<p><font color='red'>Erro ao conectar-se no servidor MySQL!</font></p>" . mysqli_connect_error());

        // teste de conexao
        if (mysqli_connect_errno()) {
            echo "<p><font color='red'>Erro ao conectar-se no servidor MySQL!/font></p>" . mysqli_connect_error();
        }
                
        return $this->con;
        
    }


}
