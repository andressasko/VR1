<?php

require_once ("functions.php");

if (!empty($_GET["mode"])){
    $mode=$_GET["mode"];
}

switch ($mode){
    case "ok":
        include ("ok.php");
        break;
    case "kontroll":
        kontrolli_vormi();
        include ("pealeht.php");
        break;
    case "veateade":
        anna_viga();
        break;
    default:
        include ("pealeht.php");
        break;
}
?>