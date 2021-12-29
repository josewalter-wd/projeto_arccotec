<?php
/*
 * -- CODIGO PARA ELIMINAR SQL INJECTION V 1.0.3
 * #array em checkbox bug resolvido
 * #resolvido problema do WHING
 * -- WALTERDESIGNER TEAM WWW.WALTERDESIGNER.COM
 */

foreach ($_POST as $key => $value) {
    if(is_string($value)){
	$value = sqlinj($value);
	$_POST[$key] = $value;
    }
}

foreach ($_GET as $key => $value) {
    if(is_string($value)){
	$value = sqlinj($value);
	$_GET[$key] = $value;
    }
}

function sqlinj($string){

	//$string = htmlspecialchars($string);
	//$string = addslashes($string);
	$string = str_ireplace("SELECT","",$string);
	$string = str_ireplace("FROM","",$string);
	$string = str_ireplace("WHERE","",$string);
	$string = str_ireplace("INSERT","",$string);
	$string = str_ireplace("UPDATE","",$string);
	$string = str_ireplace("DELETE","",$string);
	$string = str_ireplace("DROP","",$string);
	$string = str_ireplace("DATABASE","",$string);
	$string = str_ireplace("TRUNCATE","",$string);
	$string = str_ireplace("../","",$string);
	$string = str_ireplace("--","",$string);
	$string = str_ireplace("==","",$string);
	$string = str_ireplace("*","",$string);
	return $string;

}
