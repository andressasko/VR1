<?php
$link ='';
require_once('pildid.php');
?>
	<div id="wrap">
	<h3>Valiku tulemus</h3>
	<p>
		<?php if (!empty($_POST) && !array_key_exists("vote", $_SESSION)) {

            foreach ($pildid as &$value) {
                if ($value['alt'] == $_POST["nimi"]){
                    $link = $value['src'];
                }
            }

			if ($_POST["nimi"] != "") {
				echo "Valitud pilt: ".htmlspecialchars($_POST["nimi"])."</br>";
				echo "</br>";
				echo "<div id=\"gallery\"><img src=\"".$link."\" alt=\"".$_POST["nimi"]."\" /> </div>";
				$_SESSION["vote"]=$_POST["nimi"];
			}
		} elseif (array_key_exists("vote", $_SESSION)){
			echo "Olete oma hääle juba varem andnud järgmisele pildile:<p id=\"gallery\"><img src=\"pildid/".$_SESSION["vote"]."\" alt = \"".$_SESSION["vote"]."\" /> </p>Mitu korda hääletada ei saa.";
		}
		else {
			echo "Palun valige galeriist pilt.";
			echo $_SESSION["vote"];
		}
		?>
		<br>
		<br>
		<a id="logoutID" href="?mode=logout">[RESET]</a></li>
	</p>

</div>
