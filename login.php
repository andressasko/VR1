<?php require_once ('functions.php'); ?>
<div id="main">
	
	<form action="?mode=login" method="post">
		
		<table border="1">

			<tbody>

			<tr>
				<td>Nimi</td>
				<td>
					<input type="text" name="name" <?php
					if(!empty($_POST["name"]))
						echo "value=\"".htmlspecialchars($_POST["name"])."\" ";
					?> />
				</td>
			</tr>

			<tr>
				<td>Salasõna</td>
				<td>
					<input type="password" name="password" />
				</td>
			</tr>

			</tbody>

		</table>

		<button type="submit" name="nupp">Logi sisse</button>
		<?php
		if (!empty($errors)): foreach ($errors as $e): ?>
		<p style="color: crimson"><?php echo $e; ?></p>
		<?php endforeach; endif; ?>
	</form>

	<br>

	<p>
		<a href="?mode=register">Registreeri kasutajaks</a>
	</p>

</div>