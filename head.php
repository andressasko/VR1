<?php require_once ('functions.php'); ?>
<!doctype html>
<html lang="et">
<head>
    <meta charset="utf-8">
<!--          http-equiv="Content-Security-Policy" content="img-src 'self' data:; default-src 'self' http://enos.itcollege.ee:8084/rsaarmae/"-->
    <link rel="stylesheet" type="text/css" media="screen" href="myStyle.css">
    <script src="gallery.js" type="text/javascript"></script>
    <title>Võrgurakendused I: Projekt</title>
</head>
<body>
<div id="menu">
    <?php if (array_key_exists('user', $_SESSION)): ?>
        <ul>
            <li><a id="indexID" <?php if ($mode == 'index' || $_GET["mode"] == 'logout'){echo ('class="active"');}?> href="?mode=index">Pealeht</a></li>
            <li><a id="galleryID" <?php if ($mode == 'gallery'){echo ('class="active"');}?> href="?mode=gallery">Galerii</a></li>
            <li><a id="logoutID" href="?mode=logout">Logi välja</a></li>
        </ul>
    <?php else : ?>
        <ul>
            <li><a id="indexID" <?php if ($mode == 'index' || $_GET["mode"] == 'logout'){echo ('class="active"');}?> href="?mode=index">Pealeht</a></li>
            <li><a id="registerID" <?php if ($mode == 'register'){echo ('class="active"');}?> href="?mode=register">Registreeri</a></li>
            <li><a id="loginID" <?php if ($mode == 'login'){echo ('class="active"');}?> href="?mode=login">Logi sisse</a></li>
        </ul>
    <?php endif; ?>
</div>
<h1>Kassipildid</h1>
<?php
    if (isset($_SESSION['teade'])): ?>
        <div class="teade"><?php echo $_SESSION['teade'];?></div>
        <?php unset($_SESSION['teade']);
    endif; ?>
