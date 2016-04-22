<div id="bodyDiv">

	<div id="main">
		<div id="gallery">
			<?php
			foreach ($pics as &$value) {

				echo "<a href=img/$value[src]><img src=thumb/$value[src] alt=$value[alt] title='$value[title]' /></a> \n";
			}
			?>
		</div>
		
	</div>
	