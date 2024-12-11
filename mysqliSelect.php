<!DOCTYPE html>
<html>
<head>
	<title>MySqli</title>
	
</head>
<body>

<?php

	$mysqli = new MySqli('localhost', 'root', '', 'voyage');

		if (isset($_GET['id'])) {

		$id = $_GET['id'];
		
		$selectWhere = $mysqli->query('select * from client where idclient='.$id);

		foreach ($selectWhere as $unselectWhere) {
		$nomModif = $unselectWhere['nom'];
		$prenomModif = $unselectWhere['prenom'];
		$villeModif = $unselectWhere['ville'];
		$regionModif = $unselectWhere['region'];
		$soldeModif = $unselectWhere['solde'];
		}
?>

<form method="post">
	
	<label for="nom">NOM</label>
	<input type="text" name="nom" value=<?php echo $nomModif; ?>><br>
	<label for="prenom">PRENOM</label>
	<input type="text" name="prenom" value=<?php echo $prenomModif; ?>><br>
	<label for="ville">VILLE</label>
	<input type="text" name="ville" value=<?php echo $villeModif; ?>><br>
	<label for="region">REGION</label>
	<input type="text" name="region" value=<?php echo $regionModif; ?>><br>
	<label for="solde">SOLDE</label>
	<input type="text" name="solde" value=<?php echo $soldeModif; ?>><br>

	<input type="submit" name="modifier" value="Modifier">
	<input type="reset" name="annuler" value="Annuler">

</form>


<?php

	if (isset($_POST['modifier'])) {
		$modif = $mysqli->prepare('update client set nom=?, prenom=?,ville=?,region=?,solde=? where idclient=?');

		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$ville = $_POST['ville'];
		$region = $_POST['region'];
		$solde = $_POST['solde'];

		$modif->execute([$nom, $prenom, $ville, $region, $solde, $id]);

		header('Location: mysqliSelect.php');
		exit();

	}


	}else{


?>

<form method="post">
	
	<label for="nom">NOM</label>
	<input type="text" name="nom"><br>
	<label for="prenom">PRENOM</label>
	<input type="text" name="prenom"><br>
	<label for="ville">VILLE</label>
	<input type="text" name="ville"><br>
	<label for="region">REGION</label>
	<input type="text" name="region"><br>
	<label for="solde">SOLDE</label>
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

		$insert = $mysqli->prepare('insert into client(nom,prenom,ville,region,solde) values(?,?,?,?,?)');

		$insert->execute([$nom, $prenom, $ville, $region, $solde]);

		header('Location: mysqliSelect.php');
		exit();
	}

	$select = $mysqli->query('select * from client order by nom asc');

	foreach ($select as $unSelect) {
		
			echo "<tr><td>".$unSelect['nom']."</td>";
			echo "<td>".$unSelect['prenom']."</td>";	
			echo "<td>".$unSelect['solde']."</td>";
			echo '<td><a href="mysqliSelect.php?id='.$unSelect['idclient'].'"><img src="images/modif.png" width=25px></a><a href="mysqliSelect.php?idsuppr='.$unSelect['idclient'].'&suppr=1"><img src="images/supp.png" width=25px></a></td></tr>';

	}

	if (isset($_GET['idsuppr']) && $_GET['suppr'])
	{
		$delete = $mysqli->query('delete from client where idclient='.$_GET['idsuppr']);

		header('Location: mysqliSelect.php');

		exit();
	}
	



	}?>

</table>

</body>
</html>