<?php
$dir = "thumb"; // kausta nimi, mida avada
$files = array(); // massiiv, kuhu lisatakse leitud failid
$width = array(); //massiiv, kuhu lisatakse leitud failide laius
$height = array(); //massiiv, kuhu lisatakse leitud failide kõrgus
if ($dh = opendir($dir)) { // kui funktsioon opendir vastava sisendiga õnnestub, siis jäta viide kaustale meelde muutujasse $dh ning läbi järgnev koodiblokk
    while (($file = readdir($dh)) !== false) { // seni, kuni funktsiooniga readdir vastavas kaustas saab kätte mingi kirje (fail/kaust), salvesta see kirje muutujasse $file ning läbi järgnev koodiblokk
        if(!is_dir($file)) { // juhul, kui saadud kirje ei ole kaust, siis lisa antud kirje failide massiivi
            $dimensions = getimagesize('img/'.$file);
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

$pics= array();
for ($i=0; $i < sizeof($files); $i++){
    $pics[$i] = array('src'=>$files[$i], 'alt'=> ($i+1).'. pilt', 'title'=>($width[$i].' * '.$height[$i]));
}
?>