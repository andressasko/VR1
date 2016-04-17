<?php
$link ='';
require_once('pildid.php');
?>
	<div id="wrap">
	<h3>Valiku tulemus</h3>
	<p>
		<?php if (!empty($_POST)) {

            foreach ($pildid as &$value) {
                if ($value['alt'] == $_POST["nimi"]){
                    $link = $value['src'];
                }
            }

			if ($_POST["nimi"] != "") {
				echo "Valitud pilt: ".htmlspecialchars($_POST["nimi"])."</br>";
				echo "</br>";
				echo "<div id=\"gallery\"><img src=\"".$link."\" alt=\"".$_POST["nimi"]."\" /> </div>";
			}
		}
		else {
			echo "Palun valige galeriist pilt.";
		}
		?>

	</p>

</div>
