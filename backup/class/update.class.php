<?php

class update {

    private $link;

    function __construct($link) {
        $this->link = $link;

        //var_dump($this->link);
    }

    public function simpleUpdate($table, $array, $colun, $search) {

        foreach ($array as $key => $value) {
            $update = mysqli_query($this->link, "UPDATE $table SET $key = '$value' WHERE $colun = '$search'") or die(mysqli_error());
        }

        return $update;
    }

}
