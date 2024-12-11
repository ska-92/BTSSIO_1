<!DOCTYPE html>
<html>
<head>
	<title>Modification</title>
</head>
<body>
<h2>Page de Modification</h2>


<?php
$id= $_GET['id'];
$mysqli = new mysqli('localhost', 'root', '', 'voyage');




$resultat = $mysqli->query('select * from client where idclient='.$id);

foreach ($resultat as $row) {
	$nom = $row['nom'];
	$prenom = $row['prenom'];
	$ville = $row['ville'];
	$region = $row['region'];
	$solde = $row['solde'];
}

?>


<form method="post">
	
	<input type="text" name="nom" value="<?php echo($nom) ?>">
	<input type="text" name="prenom" value="<?php echo($prenom) ?>">
	<input type="text" name="ville" value="<?php echo($ville) ?>">
	<input type="text" name="region" value="<?php echo($region) ?>">
	<input type="text" name="solde" value="<?php echo($solde) ?>">

	<input type="submit" name="modif">

</form>

<?php

if (isset($_POST['modif'])) {

	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$ville = $_POST['ville'];
	$region = $_POST['region'];
	$solde = $_POST['solde'];

	$modif = $mysqli->prepare('update client set nom=?,prenom=?,ville=?,region=?,solde=? where idclient=?');

	$modif->execute([$nom,$prenom,$ville,$region,$solde,$id]);

	header('Location: mysqli2.php');
  	exit();

	
}
?>

</body>
</html>