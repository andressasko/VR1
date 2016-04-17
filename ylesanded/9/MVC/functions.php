<?php
function kontrolli_vormi(){
    global $errors; // olen globaalne muutuja, mis on nähtav ka väljaspool funktsiooni
    $errors=array();
    if (!empty($_POST)){
        //vorm esitati
        if (empty($_POST["nimi"])){
            $errors[]="nimi puudub";
        }
        if (empty($_POST["vanus"])){
            $errors[]="vanus puudub";
        }
        if (empty($_POST["sugu"])){
            $errors[]="sugu puudub";
        }
        //kontroll läbi
        if (empty($errors)){
            //kõik ok
            //siin peaks infoga midagi tegema (andmebaas või sessioon)
            header("Location: kontroller.php?mode=ok");
            exit(0);
        }
    }
}

?>