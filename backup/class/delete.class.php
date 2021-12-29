<?php

class delete {

    private $link;

    function __construct($link) {
        $this->link = $link;

        //var_dump($this->link);
    }

    public function totalDelete($table, $colun, $search) {

        $delete = mysqli_query($this->link, "DELETE FROM $table WHERE $colun = $search");

        return $delete;
    }

}
