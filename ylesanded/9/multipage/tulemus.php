<?php require_once('head.html');
require_once('pildid.php');
$link ='';
?>
	<div id="wrap">
	<h3>Valiku tulemus</h3>
	<p>
		<?php if (!empty($_GET)) {

            foreach ($pildid as &$value) {
                if ($value['alt'] == $_GET["nimi"]){
                    $link = $value['src'];
                }
            }

			if ($_GET["nimi"] != "") {
				echo "Valitud pilt: ".htmlspecialchars($_GET["nimi"]);
				echo "</br>";
				echo "<div id=\"gallery\"><img src=\"".$link."\" alt=\"".$_GET["nimi"]."\" /> </div>";
			}
		}
		else {
			echo "Palun valige galeriist pilt.";
		}
		?>
	</p>
</div>
<?php require_once('foot.html') ?>

