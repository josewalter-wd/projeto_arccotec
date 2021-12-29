<?php

/*
 * CLASSE PARA PESQUISA EM BANCO DE DADOS
 * WalterDesigner - 21-05-2011
 * 13-09-16 -> INCLUIDO VAR $rows
 * 03-08-17 -> ALTERADO mysqli
 */

class query {

    public $rows; //numero de linhas retornados no query
    private $link;

    function __construct($link) {
        $this->link = $link;
        
        //var_dump($this->link);
    }

    public function simpleQuery($table, $colun, $search) {

        //var_dump("SELECT * FROM $table WHERE $colun = '$search'");
        $result = mysqli_query($this->link, "SELECT * FROM $table WHERE $colun = '$search'");
        
        if ($result) {
            $query = mysqli_fetch_object($result);
        }

        return $query;
    }

    public function simpleQueryAr($table, $colun, $search) {

        $result = mysqli_query($this->link, "SELECT * FROM $table WHERE $colun = '$search'");

        if ($result) {
            $query = mysqli_fetch_array($result);
        }

        return $query;
    }

    public function queryWithLimit($table, $order, $limit, $visual) {

        $result = mysqli_query($this->link, "SELECT * FROM $table ORDER BY $order $visual LIMIT $limit");

        $this->rows = mysqli_num_rows($result);

        return $result;
    }

    public function queryWithRestrict($table, $colun, $search, $order) {

        $result = mysqli_query($this->link, "SELECT * FROM $table WHERE $colun = $search ORDER BY $order");

        $this->rows = mysqli_num_rows($result);

        return $result;
    }

    public function queryWithRestrictAndLimit($table, $colun, $search, $order, $limit) {

        $result = mysqli_query($this->link, "SELECT * FROM $table WHERE $colun = $search ORDER BY $order LIMIT $limit");

        $this->rows = mysqli_num_rows($result);

        return $result;
    }

    public function simpleQueryWith2Restrict($table, $colun1, $search1, $colun2, $search2, $order) {

        $result = mysqli_query($this->link, "SELECT * FROM $table WHERE $colun1 = '$search1' AND $colun2 = '$search2' ORDER BY $order");

        if ($result) {
            $query = mysqli_fetch_object($result);
        }

        return $result;
    }

    public function queryWith2Restrict($table, $colun1, $search1, $colun2, $search2, $order) {

        $result = mysqli_query($this->link, "SELECT * FROM $table WHERE $colun1 = '$search1' AND $colun2 = '$search2' ORDER BY $order");

        $this->rows = mysqli_num_rows($result);

        return $result;
    }

    public function totalQuery($table, $order, $visual) {

        $result = mysqli_query($this->link, "SELECT * FROM $table ORDER BY $order $visual");

        $this->rows = mysqli_num_rows($result);

        return $result;
    }

    public function totalCont($table, $order, $visual) {

        $result = mysqli_query($this->link, "SELECT * FROM $table ORDER BY $order $visual");

        return mysqli_num_rows($result);
    }

    public function simpleCont($table, $colun, $search) {

        $result = mysqli_query($this->link, "SELECT * FROM $table WHERE $colun = $search");

        $rows = mysqli_num_rows($result);

        return $rows;
    }

}
