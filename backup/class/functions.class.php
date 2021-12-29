<?php

/* functions.class.php
 * Classe para funcoes avulsas
 * WalterDesigner - 07-12-2016
 */

class functions {

    private $link;

    function __construct($link) {
        $this->link = $link;

        //var_dump($this->link);
    }

    public function createDinamicSelect($table, $id, $selected) {

        $query = mysqli_query("SHOW COLUMNS FROM $table");

        while ($field = mysqli_fetch_object($query)) {
            $fields[$field->Field] = array(
                'Type' => $field->Type,
                'Null' => $field->Null,
                'Default' => $field->Default,
                'Extra' => $field->Extra,
            );
        }

        foreach ($fields as $key => $value) {
            $campos[] = $key;
        }

        $select = "<select class='form-control' name='$id'>";
        $relacionais = mysqli_query("SELECT * FROM $table ORDER BY $id ASC");
        $select .= "<option value=''> ----- SELECIONE ----- </option>";
        while ($relacional = mysqli_fetch_object($relacionais)) {
            if ($selected == $relacional->$id) {
                $select .= "<option value='" . $relacional->$id . "' selected='selected'>" . $relacional->$campos[1] . "</option>";
            } else {
                $select .= "<option value='" . $relacional->$id . "'>" . $relacional->$campos[1] . "</option>";
            }
        }
        $select .= '</select>';

        return $select;
    }

    public function createDinamicSelectREF($table, $id, $selected, $REF) {

        $query = mysqli_query("SHOW COLUMNS FROM $table");

        while ($field = mysqli_fetch_object($query)) {
            $fields[$field->Field] = array(
                'Type' => $field->Type,
                'Null' => $field->Null,
                'Default' => $field->Default,
                'Extra' => $field->Extra,
            );
        }

        foreach ($fields as $key => $value) {
            $campos[] = $key;
        }

        $select = "<select class='form-control' name='$id'>";
        $relacionais = mysqli_query("SELECT * FROM $table ORDER BY $id ASC");
        $select .= "<option value=''> ----- SELECIONE ----- </option>";
        while ($relacional = mysqli_fetch_object($relacionais)) {
            if ($selected == $relacional->$id) {
                $select .= "<option value='" . $relacional->$id . "' selected='selected'>REF-" . $relacional->$campos[$REF] . " " . $relacional->$campos[1] . "</option>";
            } else {
                $select .= "<option value='" . $relacional->$id . "'>REF-" . $relacional->$campos[$REF] . " " . $relacional->$campos[1] . "</option>";
            }
        }
        $select .= '</select>';

        return $select;
    }

    public function text($titulo_texto) {
        //funcao para buscar o texto e retornar
        $result = mysqli_query($this->link, "SELECT * FROM tb_textos WHERE titulo_texto = '$titulo_texto'");
        if ($result) {
            $query = mysqli_fetch_object($result);
        }
        return $query->texto_texto;
    }

    public function normalizaURL($url) {
        $url = strtolower(utf8_decode($url));
        $i = 1;
        $url = strtr($url, utf8_decode('àáâãäåæçèéêëìíîïñòóôõöøùúûýýÿ'), 'aaaaaaaceeeeiiiinoooooouuuyyy');
        $url = preg_replace("/([^a-z0-9])/", '-', utf8_encode($url));
        while ($i > 0)
            $url = str_replace('--', '-', $url, $i);
        if (substr($url, -1) == '-')
            $url = substr($url, 0, -1);
        return $url;
    }

}
