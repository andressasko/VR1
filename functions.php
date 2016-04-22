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
        } elseif ($_POST["name"] != "kasutaja") {
            $errors[]="Sellist kasutajat ei ole registreeritud.";
        }
        if (empty($_POST["password"])){
            $errors[]="Salasõna puudub.";
        } elseif ($_POST["name"] == "kasutaja" && $_POST["password"] != "parool"){
            $errors[]="Vale parool.";
        }
        //kontroll läbi
        if (empty($errors)){
            //kõik ok
            //siin peaks infoga midagi tegema (andmebaas või sessioon)
            if ($_POST["name"] == "kasutaja" && $_POST["password"] == "parool") {
                session_start();
                $_SESSION["user"] = "Sisse logitud alates ".date(time()).".";
                $_SESSION["teade"] = "Oled sisse logitud kasutajana '".$_POST['name']."'.";
                header("Location: controller.php?mode=gallery");
                exit(0);
            }
        }
    }
    require_once('login.php');
}

function viewRegister(){
    require_once('register.php');
}

function viewUpload(){

    if (array_key_exists('user', $_SESSION)){
        require_once('upload.php');
    } else {
        $_SESSION["teade"] = "Failide üleslaadimine on lubatud ainult sisselogitud kasutajatel.";
        header("Location: controller.php?mode=index");
    }
}

function logOut(){
    $_SESSION["teade"] = "Oled välja logitud.";
    unset($_SESSION["user"]);
    header("Location: controller.php?mode=index");
}

function startSession(){
    // siin ees võiks muuta ka sessiooni kehtivusaega, aga see pole hetkel tähtis
    session_start();
}

function endSession(){
    $_SESSION = array();
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-42000, '/');
    }
    session_destroy();
}


?>