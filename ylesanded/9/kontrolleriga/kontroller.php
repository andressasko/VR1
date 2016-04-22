<?php
session_start();
require_once('head.html');
require_once('pildid.php');
$mode = 'pealeht';

if (!empty($_GET)) {
    if ($_GET["mode"] != "") {
        $mode = $_GET["mode"];
    }
}

switch ($mode) {
    case 'galerii':
        require_once('galerii.php');
        break;
    case 'vote':
        if (array_key_exists("vote", $_SESSION)){
            require_once ('tulemus.php');
            break;
        }
        require_once('vote.php');
        break;
    case 'tulemus':
        require_once('tulemus.php');
        break;
    case 'logout':
        unset($_SESSION["vote"]);
        header("Location: kontroller.php?mode=vote");
        break;
    default:
        require_once('pealeht.php');
}
require_once('foot.html'); ?>

