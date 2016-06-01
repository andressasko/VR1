<?php

function viewFront(){
    require_once('front.php');
}

function viewGallery(){
    if (array_key_exists('user', $_SESSION)){
        require_once('gallery.php');
    } else {
        $_SESSION["teade"] = "Galeriid näevad ainult sisse logitud kasutajad.";
        header("Location: controller.php?mode=index");
    }
}

function all_ID(){
    $IDs = array();
    $DBpics=displayDBpics();
    foreach ($DBpics as $pic){
        $IDs[]=$pic['id'];
    }
        echo '<pre>';
    print_r($IDs);
    echo '</pre>';
}

function viewLogin(){

    $errors = array();

    if (!empty($_POST)){
        //vorm esitati

        if (empty($_POST["name"])){
            $errors[]="Nimi puudub.";
        }
        //nimi olemas

        $u = mysqli_real_escape_string($_SESSION['connection'],$_POST["name"]);
        $userMatch = false;
        $sql = "SELECT username FROM rsaarmae_users";
        $result = mysqli_query($_SESSION['connection'], $sql);
        while ($row = mysqli_fetch_assoc($result)){
            if ($row['username'] == $u){
                $userMatch = true;
            }
        }
        
        if (empty($_POST["name"])){

        }
        elseif (!$userMatch) {
            $errors[]="Sellist kasutajat ei ole registreeritud.";
        }
        $passMatch = false;
        if (empty($_POST["password"])){
            $errors[]="Salasõna puudub.";
        } else {
            $p = mysqli_real_escape_string($_SESSION['connection'],$_POST["password"]);
            $sql = "SELECT pass FROM rsaarmae_users";
            $result = mysqli_query($_SESSION['connection'], $sql);
            while ($row = mysqli_fetch_assoc($result)){
                if ($row['pass'] == sha1($p)){
                    $passMatch = true;
                }
            }
        }

        if ($userMatch && !$passMatch){
            $errors[]="Vale parool.";
        }
        //kontroll läbi
        if (empty($errors)){
            //kõik ok
            //siin peaks infoga midagi tegema (andmebaas või sessioon)
            if ($userMatch && $passMatch) {
                startSession();
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
    
    $errors = array();
    
    if (!empty($_POST)) {
        //vorm esitati

        if (empty($_POST["name"])) {
            $errors[] = "Nimi puudub.";
        }
        //nimi olemas

        $u = mysqli_real_escape_string($_SESSION['connection'], $_POST["name"]);
        $p1 = '';
        $p2 = '';

        $userMatch = false;
        $sql = "SELECT username FROM rsaarmae_users";
        $result = mysqli_query($_SESSION['connection'], $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            if ($row['username'] == $u) {
                $userMatch = true;
                $errors[] = "Sellise nimega kasutaja on juba registreeritud, proovige teist nime";
            }
        }

        if (empty($_POST["name"])) {

        }
        if (empty($_POST["password"])) {
            $errors[] = "Salasõna puudub.";
        } else {
            $p1 = mysqli_real_escape_string($_SESSION['connection'], $_POST["password"]);
        }
        if (empty($_POST["password_check"])) {
            $errors[] = "Salasõna kontroll puudub.";
        } else {
            $p2 = mysqli_real_escape_string($_SESSION['connection'], $_POST["password_check"]);
        }
        if ($p1 != $p2) {
            $errors[] = "Salasõnad ei ühti.";
        }

        if (!$userMatch && empty($errors)) {
            $query = "INSERT INTO rsaarmae_users (username, pass) VALUES (''$u'', SHA1('\''$p\''));";
            mysqli_query($_SESSION['connection'],$query);
            startSession();
            $_SESSION["user"] = "Sisse logitud alates ".date(time()).".";
            $_SESSION["teade"] = "Registreeritud ja sisse logitud kasutaja nimega '" . $_POST['name'] . "'.";
            header("Location: controller.php?mode=gallery");
            exit(0);
        }
    }
    require_once('register.php');
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

function connect_db(){
    global $connection;
    $host="localhost";
    $user="test";
    $pass="t3st3r123";
    $db="test";
    $connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa mootoriga ühendust");
    mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
    $_SESSION['connection'] = $connection;
}

function displayDBpics(){
    $DBpics=array();
    $sql = "SELECT id, filename FROM rsaarmae_pictures";
    $result = mysqli_query($_SESSION['connection'], $sql);
    while ($row = mysqli_fetch_assoc($result)){
        $DBpics[]=$row;
    }
    return $DBpics;

}

function updateDB(){
    mysqli_query($_SESSION['connection'], "TRUNCATE TABLE rsaarmae_pictures");
    echo sizeof($_SESSION['files']);
    $files=$_SESSION['files'];
    for ($i=0; $i < sizeof($_SESSION['files']); $i++){
        mysqli_query($_SESSION['connection'], "INSERT INTO rsaarmae_pictures (filename) VALUES ('$files[$i]')");
    }
    header("Location: controller.php?mode=gallery");
}

function setupPictures()
{
    $dir = "thumb"; // kausta nimi, mida avada
    $files = array();// massiiv, kuhu lisatakse leitud failid
    $width = array(); //massiiv, kuhu lisatakse leitud failide laius
    $height = array(); //massiiv, kuhu lisatakse leitud failide kõrgus
    if ($dh = opendir($dir)) { // kui funktsioon opendir vastava sisendiga õnnestub, siis jäta viide kaustale meelde muutujasse $dh ning läbi järgnev koodiblokk
        while (($file = readdir($dh)) !== false) { // seni, kuni funktsiooniga readdir vastavas kaustas saab kätte mingi kirje (fail/kaust), salvesta see kirje muutujasse $file ning läbi järgnev koodiblokk
            if (!is_dir($file)) { // juhul, kui saadud kirje ei ole kaust, siis lisa antud kirje failide massiivi
                $dimensions = getimagesize('img/' . $file);
                $width[] = $dimensions[0];
                $height[] = $dimensions[1];
                $files[] = $file;
            }
        }
        closedir($dh); // kui kausta lugemine on läbi, sulge ühendus kaustaga.
    } else { // kui funktsioon opendir luhtub(kaust puudub), siis esita veateade ja lõpeta programmi töö
        die("Ei suuda avada kataloogi $dir");
    }
//			print_r($files);// kuva failide massiivi sisu

    $pics = array();
    for ($i = 0; $i < sizeof($files); $i++) {
        $pics[$i] = array('src' => $files[$i], 'alt' => ($i + 1) . '_pilt', 'title' => ($width[$i] . ' * ' . $height[$i]));
    }
    $_SESSION['files'] = $files;
    $_SESSION['pics'] = $pics;
}

function displayPictures(){
    foreach ( $_SESSION['pics'] as $value) {
        echo "<a href=img/$value[src]><img src=thumb/$value[src] alt=$value[alt] title='$value[title]' /></a> \n";
    }

}

?>