<?php
require_once 'functions.php';
startSession();
connect_db();
setupPictures();

if (!empty($_GET)) {
    if ($_GET["mode"] != "") {
        $mode = $_GET["mode"];
    }
} else {$mode = "index";}

require_once('head.php');

switch ($mode) {
    case 'index':
        viewFront();
        break;
    case 'gallery':
        viewGallery();
        break;
    case 'login':
        viewLogin();
        break;
    case 'register':
        viewRegister();
        break;
    case 'logout':
        logOut();
        break;
    case 'updateDB':
        updateDB();
        break;
    default:
        viewFront();
}
require_once('foot.html'); ?>