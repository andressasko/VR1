<?php

function viewFront(){
    require_once('front.php');
}

function viewGallery(){
    require_once('pics.php');
    require_once('gallery.php');
}

function viewLogin(){
    $errors = array();
    if (!empty($_POST)){
        //vorm esitati
        if (empty($_POST["name"])){
            $errors[]="Nimi puudub.";
        }
        if (empty($_POST["password"])){
            $errors[]="Salasõna puudub.";
        }
        //kontroll läbi
        if (empty($errors)){
            //kõik ok
            //siin peaks infoga midagi tegema (andmebaas või sessioon)
            header("Location: controller.php?mode=gallery");
            exit(0);
        }
    }
    require_once('login.php');
}

function viewRegister(){
    require_once('register.php');
}

function viewUpload(){
    require_once('upload.php');
}

?>