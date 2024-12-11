<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form method="post">
		
<?php

	for ($i=0; $i < 5; $i++) { 
		
		echo 'Nombre '.($i+1).' : <input type="text" name="nbre'.$i.'">';
	}

?>
	
	<input type="submit" name="valider" value="Valider">

	</form>

<?php
	

	if (isset($_POST['valider'])) {

		$nombres = array();
		$somme = 0;


		for ($i=0; $i < 5; $i++) { 

			$nombres[$i] = $_POST['nbre'.$i];
			$somme+=$nombres[$i];

		}

		$min = $nombres[0];
		$max = $nombres[0];

		for ($i=0; $i < 5; $i++) { 

			if ($min > $nombres[$i]) {
				$min = $nombres[$i];
			}

			if ($max < $nombres[$i]) {
				$max = $nombres[$i];
			}


		}

		echo "min : ".$min."<br>";
		echo "max : ".$max."<br>";
		echo "moyenne : ".($somme/5)."<br>";

	}


?>

</body>
</html>