<?php

class fields {

    public $fields_;
    private $link;

    function __construct($link) {
        $this->link = $link;

        //var_dump($this->link);
    }

    function simpleFields($table) {

        $query = mysqli_query($this->link, "SHOW COLUMNS FROM $table");
        
        
        while ($field = mysqli_fetch_object($query)) {
            $fields[$field->Field] = array(
                'Type' => $field->Type,
                'Null' => $field->Null,
                'Default' => $field->Default,
                'Extra' => $field->Extra,
            );
        }
        
        
        return $fields;
    }

}
