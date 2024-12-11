
<form method="post">

	<input type="text" name="nom"><br>
	<input type="text" name="prenom"><br>
	<input type="text" name="ville"><br>
	<input type="text" name="region"><br>
	<input type="text" name="solde"><br>

	<input type="submit" name="valider" value="Valider">
	
</form>


<?php

$mysqli = new mysqli("localhost", "root", "", "voyage");

if (isset($_POST['valider'])) {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$ville = $_POST['ville'];
	$region = $_POST['region'];
	$solde = $_POST['solde'];

	$insert = $mysqli->prepare("insert into client (nom, prenom, ville, region, solde) values(?, ?, ?, ?, ?)");

	$insert->execute([$nom, $prenom, $ville, $region, $solde]);

	header('Location: mysqli.php');

	exit();
}


$result = $mysqli->query("select * from client");

foreach ($result as $row) {
    echo " nom = " . $row['nom'] . "<br>";
}



?>