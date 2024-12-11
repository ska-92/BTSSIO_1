<!DOCTYPE html>
<html>
<head>
	<title>MySqli</title>
	
</head>
<body>

<?php

	$mysqli = new MySqli('localhost', 'root', '', 'voyage');

		if (isset($_GET['action']) && $_GET['action'] == 'modif') {

		$id = $_GET['id'];
		
		$selectWhere = $mysqli->query('select * from client where idclient='.$id);

		foreach ($selectWhere as $unselectWhere) {
		$nomModif = $unselectWhere['nomclient'];
		$prenomModif = $unselectWhere['prenom'];
		$villeModif = $unselectWhere['ville'];
		$regionModif = $unselectWhere['region'];
		$soldeModif = $unselectWhere['solde'];
		}
?>

<form method="post">
	
	<label for="nom">NOM</label><br>
	<input type="text" name="nom" value=<?php echo $nomModif; ?>><br>
	<label for="prenom">PRENOM</label><br>
	<input type="text" name="prenom" value=<?php echo $prenomModif; ?>><br>
	<label for="ville">VILLE</label><br>
	<input type="text" name="ville" value=<?php echo $villeModif; ?>><br>
	<label for="region">REGION</label><br>
	<input type="text" name="region" value=<?php echo $regionModif; ?>><br>
	<label for="solde">SOLDE</label><br>
	<input type="text" name="solde" value=<?php echo $soldeModif; ?>><br>

	<input type="submit" name="modifier" value="Modifier">
	<input type="reset" name="annuler" value="Annuler">

</form>


<?php

	if (isset($_POST['modifier'])) {
		$modif = $mysqli->prepare('update client set nomclient=?, prenom=?,ville=?,region=?,solde=? where idclient=?');

		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$ville = $_POST['ville'];
		$region = $_POST['region'];
		$solde = $_POST['solde'];

		$modif->execute([$nom, $prenom, $ville, $region, $solde, $id]);

		header('Location: mysqliConnect.php');
		exit();

	}


	}else{


?>

<form method="post">
	
	<label for="nom">NOM</label><br>
	<input type="text" name="nom"><br>
	<label for="prenom">PRENOM</label><br>
	<input type="text" name="prenom"><br>
	<label for="ville">VILLE</label><br>
	<input type="text" name="ville"><br>
	<label for="region">REGION</label><br>
	<input type="text" name="region"><br>
	<label for="solde">SOLDE</label><br>
	<input type="text" name="solde"><br>

	<input type="submit" name="valider" value="Valider">
	<input type="reset" name="annuler" value="Annuler">

</form>

<table border="1">
<tr>
	<th>NOM</th>
	<th>PRENOM</th>
	<th>SOLDE</th>
	<td>Mod/suppr</td>

</tr>



	<?php




	

	if (isset($_POST['valider'])) {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$ville = $_POST['ville'];
		$region = $_POST['region'];
		$solde = $_POST['solde'];

		$insert = $mysqli->prepare('insert into client(nomclient,prenom,ville,region,solde) values(?,?,?,?,?)');

		$insert->execute([$nom, $prenom, $ville, $region, $solde]);

		header('Location: mysqliConnect.php');
		exit();
	}

	$select = $mysqli->query('select * from client order by nomclient asc');

	foreach ($select as $unSelect) {
		
			echo "<tr><td>".$unSelect['nomclient']."</td>";
			echo "<td>".$unSelect['prenom']."</td>";	
			echo "<td>".$unSelect['solde']."</td>";
			echo '<td><a href="mysqliConnect.php?id='.$unSelect['idclient'].'&action=modif"><img src="images/modif.png" width=25px></a><a href="mysqliConnect.php?idsuppr='.$unSelect['idclient'].'&action=supp"><img src="images/supp.png" width=25px></a></td></tr>';

	}

	if (isset($_GET['idsuppr']) && $_GET['action'] == 'supp')
	{
		$delete = $mysqli->query('delete from client where idclient='.$_GET['idsuppr']);

		header('Location: mysqliConnect.php');

		exit();
	}
	



	}?>

</table>

<br>
<a href="index.php">Accueil</a>

</body>
</html>