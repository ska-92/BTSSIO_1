<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
table {
  border-collapse: collapse;
  width: 25%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}

input[type=text] {
  width: 7%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}

h1 {
  color: red;
}

h1, td, th, tr {
  font-family: "Lucida Console", "Courier New", monospace;
}

.button {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

</style>
</head>
<body>
<form method="post">

	<table border="1">
		
		<tr>
		
			<th>N°</th>
			<th>Jour</th>
		
		</tr>
		<tr>
			<td>1</td>
			<td>Lundi</td>
		</tr>
		<tr>
			<td>2</td>
			<td>Mardi</td>
		</tr>
		<tr>
			<td>3</td>
			<td>Mercredi</td>
		</tr>
		<tr>
			<td>4</td>
			<td>Jeudi</td>
		</tr>
		<tr>
			<td>5</td>
			<td>Vendredi</td>
		</tr>
		<tr>
			<td>6</td>
			<td>Samedi</td>
		</tr>
		<tr>
			<td>7</td>
			<td>Dimanche</td>
		</tr>

	</table>
	<br>
	Saisir le jour : <br><input type="text" name="choix"><br>

	<input type="submit" class="button" name="valider" value="VALIDER"><br><br>
	
</form>

<?php

	if (isset($_POST["valider"])) {
		
		$choix = $_POST["choix"];

		switch ($choix) {
			case 1: case 2: case 3: case 4: case 5: 
				echo "<h2>jour travaillé</h2>";
				break;

			case 6: case 7: 
				echo "<h2>jour de repos</h2>";
				break;
			
			default:
				echo "<h1 color='red'>erreur de saisi</h1>";
				break;
		}

	}

?>
</body>
</html>