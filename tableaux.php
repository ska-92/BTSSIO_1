<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>

	<form>

<?php

		for ($i=0; $i < 10; $i++) { 

			echo '<input type="text" name="nbre'.$i.'">';
			
		}

?>
		
		


		<input type="submit" name="valider" value="Valider">

	</form>
	


<?php

	$tab = array();

	$somme = 0;
	$i = 0;

	if (isset($_POST['valider'])) {
		 for ($i=0; $i < 10; $i++) { 
		 	$tab[$i] = $_POST['nbre'.$i];
		 }

		 for ($i=0; $i < 10; $i++) { 
			
			if ($min > $tab[$i]) {
				$min = $tab[$i];
			}

			if ($max < $tab[$i]) {
				$max = $tab[$i];
			}

			$somme+=$tab[$i];

		}

	}


	echo "le max est : ".$max;
	echo "le min est : ".$min;
	echo "la somme est : ".$somme;
	echo "la moyenne est :".$somme/10;



?>
</body>
</html>