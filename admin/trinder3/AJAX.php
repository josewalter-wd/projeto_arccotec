<?php

require 'includes/engine.php';

//sleep(3);

$resultado .= "<option value='0'> ----- SELECIONE ----- </option>";

    $results = $query->queryWithRestrict($_GET['t'], $_GET['c'], $_GET['s'], $_GET['o']);
        while($result = mysqli_fetch_array($results)){
            $resultado .= "<option value='".$result[$_GET['o']]."'>".$result[$_GET['n']]."</option>";
        }

echo $resultado; 