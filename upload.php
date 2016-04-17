<div id="main">
	</br>
	<form action="front.php" method="post" enctype="multipart/form-data">
		<strong>Pildi üles laadimine</strong>
		<table>

			<tbody>

			<tr>
				<td>Pildi pealkiri:</td>
				<td>
					<input type="text" name="pealkiri">
				</td>
			</tr>

			<tr>
				<td>Pildi autor:</td>
				<td>
					<input type="text" name="autor">
				</td>
			</tr>
			<tr>
				<td>Täissuuruses pilt:</td>
				<td>
					<input type="file" name="img"/>
				</td>
			</tr>
			<tr>
				<td>Sama pilt väiksemana (kõrgus max 150px):</td>
				<td>
					<input type="file" name="thumb"/><br>
				</td>
			</tr>

			</tbody>

		</table>

		<input type="submit" value="Laadi pilt üles"/>

	</form>

</div>