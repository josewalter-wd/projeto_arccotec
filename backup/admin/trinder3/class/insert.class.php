<?php

class insert {

    private $colun;
    public $id;
    private $link;

    function __construct($link) {
        $this->link = $link;

    }

    public function simpleInsert($table, $array) {

        $i = 0;
        $len = count($array);
        foreach ($array as $key => $value) {
            
            if ($i == $len - 1) {
                $coluns .= $key . ' '; 
                $data .= "'" . $value . "' ";
            }else{
                $coluns .= $key . ', ';
                $data .= "'" . $value . "', ";
                
            }
            
            if($i == 0){
                $this->colun = $key;
            }
            
            $i++;            
            
        }
        //var_dump($this->link);
        //var_dump("INSERT INTO $table ($coluns) VALUES ($data)");
        $insert = mysqli_query($this->link, "INSERT INTO $table ($coluns) VALUES ($data)") or die(mysqli_error());
        $this->id = $this->lastId($table, $this->colun);

        return $insert;
        
    }

    public function lastId($table, $id) {

        $last = mysqli_query($this->link, "SELECT max($id) as $id FROM $table");
        $result = mysqli_fetch_array($last);
        
        return (int) $result[$id];
    }

}
