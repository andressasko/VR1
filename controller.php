<?php
require_once ('functions.php');
startSession();

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
    case 'upload':
        viewUpload();
        break;
    case 'logout':
        logOut();
        break;
    default:
        viewFront();
}
require_once('foot.html'); ?>