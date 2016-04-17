<?php
require_once ('functions.php');
require_once('head.html');
$mode = 'pealeht';

if (!empty($_GET)) {
    if ($_GET["mode"] != "") {
        $mode = $_GET["mode"];
    }
}

switch ($mode) {
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
    default:
        viewFront();
}
require_once('foot.html'); ?>