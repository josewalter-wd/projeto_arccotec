<?php

/* functions.class.php
 * Classe para funcoes avulsas
 * WalterDesigner - 07-12-2016
 */

class functions {

    public function createDinamicSelect($link, $table, $id, $selected) {
                
        $query = mysqli_query($link, "SHOW COLUMNS FROM $table");
        
        while($field = mysqli_fetch_object($query)){
            $fields[$field->Field] = array(
                'Type' => $field->Type,
                'Null' => $field->Null,
                'Default' => $field->Default,
                'Extra' => $field->Extra,
            );
        }
                
        foreach ($fields as $key => $value) {$campos[] = $key;}
                
        $select = "<select class='form-control' name='$id' id='$id'>";
        $relacionais = mysqli_query($link, "SELECT * FROM $table ORDER BY $id ASC");
            $select .= "<option value=''> ----- SELECIONE ----- </option>";
            while($relacional = mysqli_fetch_array($relacionais)){
                if($selected == $relacional[$id]){
                    $select .= "<option value='".$relacional[$id]."' selected='selected'>".$relacional[$campos[1]]."</option>";
                }else{
                    $select .= "<option value='".$relacional[$id]."'>".$relacional[$campos[1]]."</option>";
                }
            }
        $select .= '</select>';
        
        return $select;
    }
    
    public function createDinamicSelectREF($link, $table, $id, $selected, $REF) {
                
        $query = mysqli_query($link, "SHOW COLUMNS FROM $table");
        
        while($field = mysqli_fetch_object($query)){
            $fields[$field->Field] = array(
                'Type' => $field->Type,
                'Null' => $field->Null,
                'Default' => $field->Default,
                'Extra' => $field->Extra,
            );
        }
                
        foreach ($fields as $key => $value) {$campos[] = $key;}
                
        $select = "<select class='form-control' name='$id' id='$id'>";
        $relacionais = mysqli_query($link, "SELECT * FROM $table ORDER BY $id ASC");
            $select .= "<option value=''> ----- SELECIONE ----- </option>";
            // GATO =)
            $id = 'id_produto';
            while($relacional = mysqli_fetch_array($relacionais)){
                if($selected == $relacional[$id]){
                    $select .= "<option value='".$relacional[$id]."' selected='selected'>".$relacional[$campos[1]]." - COR(".$relacional[$campos[$REF]].")</option>";
                }else{
                    $select .= "<option value='".$relacional[$id]."'>".$relacional[$campos[1]]." - COR(".$relacional[$campos[$REF]].")</option>";
                }
            }
        $select .= '</select>';
        
        return $select;
    }

}
