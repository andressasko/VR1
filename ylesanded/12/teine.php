<?php

$user = "test";
$pass = "t3st3r123";
$db = "test";
$host = "localhost";

$link = mysqli_connect($host, $user, $pass, $db) or die("ei saanud ühendatud - ");
mysqli_query($link, "SET CHARACTER SET UTF8")or die( $sql. " - ". mysqli_error($link));

$v2ljad = "name, age, cage";

$sql = "SELECT $v2ljad FROM rsaarmae_zoo ";
$result = mysqli_query($link, $sql) or die( $sql. " - ". mysqli_error($link));

while ( $rida = mysqli_fetch_assoc($result) ){
		// siin kasutan $rida muutujat
		echo "looma nimi on: {$rida['name']}, ta on {$rida['age']} aastat vana ja asub {$rida['cage']}. puuris<br/>";
}
mysqli_free_result($result);

?>