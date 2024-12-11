<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form method="post">

<?php

	$etudiants = array();

	for ($i=0; $i < 5; $i++) { 

		echo 'Etudiant '.($i+1).' <input type="text" name="etudiant'.$i.'"><br>';
		
	}

	
?>
		<br>
		<input type="submit" name="valider" value="Valider">

	</form>

<?php
	
	if (isset($_POST['valider'])) {

	for ($i=0; $i < 5; $i++) { 
		$etudiants[$i] = $_POST['etudiant'.$i];
	}

	sort($etudiants);

	foreach ($etudiants as $unEtudiant) {
		
		echo $unEtudiant."<br>";

	}

	}

?>

</body>
</html>