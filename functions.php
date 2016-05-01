<?php

function viewFront(){
    require_once('front.php');
}

function viewGallery(){
//    require_once('pics.php');
    require_once('gallery.php');
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


function connect_db(){
    global $connection;
    $host="localhost";
    $user="test";
    $pass="t3st3r123";
    $db="test";
    $connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa mootoriga ühendust");
    mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
    $_SESSION['connection'] = $connection;
//    echo '<pre>';
//    print_r($_SESSION['connection']);
//    echo '<br/>';
//    print_r($connection);
//    echo '</pre>';

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
//    $dbFilename = array();
//    $result = mysqli_query($connection, "SELECT filename FROM rsaarmae_pictures");
//    while ($row = mysqli_fetch_array($result)) {
//        $dbFilename[] = $row['filename'];
////        echo $row['filename'];
//    }
//    print_r($files);
//    print_r($dbFilename);
//    for ($i=0; $i <= sizeof($files); $i++){
////        echo $files[$i];
//        $exists = 0;
//        for ($j=0; $j <= sizeof($dbFilename); $j++){
//            if ($files[$i] == $dbFilename[$j]){
//                $exists++;
//            }
//        }
//        if ($exists == 0){
//            mysqli_query($connection, "INSERT INTO rsaarmae_pictures (filename) VALUES ('test2.jpg')");
//        }
//    }
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
        $pics[$i] = array('src' => $files[$i], 'alt' => ($i + 1) . '. pilt', 'title' => ($width[$i] . ' * ' . $height[$i]));
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