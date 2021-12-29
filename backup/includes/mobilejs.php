<?php

$iphone = strpos($_SERVER['HTTP_USER_AGENT'], "iPhone");

$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

$palmpre = strpos($_SERVER['HTTP_USER_AGENT'], "webOS");

$berry = strpos($_SERVER['HTTP_USER_AGENT'], "BlackBerry");

$ipod = strpos($_SERVER['HTTP_USER_AGENT'], "iPod");

$ieMobile = strpos($_SERVER['HTTP_USER_AGENT'], "IEMobile");

//$server = $_SERVER['HTTP_USER_AGENT']; echo "<script>alert('$server')</script>";

if ($iphone || $android || $palmpre || $ipod || $berry || $ieMobile == true) {

    //header('Location: /m');

    //OU SE PREFERIR

    //echo "<script>window.location='/m'</script>";
}
?>