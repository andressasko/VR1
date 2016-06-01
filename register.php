<?php require_once ('functions.php'); ?>
<div id="main">
	<br/>
	<form action="?mode=register" method="post">

		<table>

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
					<input type="password" name="password">
				</td>
			</tr>

			<tr>
				<td>Salasõna uuesti</td>
				<td>
					<input type="password" name="password_check">
				</td>
			</tr>

			</tbody>

		</table>

		<button type="submit" name="nupp">Registreeri</button>
		<?php
		if (!empty($errors)): foreach ($errors as $e): ?>
			<p style="color: crimson"><?php echo $e; ?></p>
		<?php endforeach; endif; ?>
	</form>

	<p>
		Kui Te olete juba registreeritud kasutaja, siis <a href="?mode=login">logige sisse siit</a>. <br>
	</p>
	
</div>
