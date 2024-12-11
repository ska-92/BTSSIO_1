<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<form method="post">
	<?php

		$tab = array();

		for ($i=0; $i < 10; $i++) { 
			echo '<input type="text" name="nbre'.$i.'"><br>' ;
		}


	?>
		<input type="submit" name="valider" value="Valider">
	</form>

	<?php

		if (isset($_POST["valider"])) {
			

			for ($i=0; $i < 10; $i++) { 
				$nbre = $_POST["nbre".$i];
				$tab[$i] = $nbre;
			}
		}

		if ($tab != null) {
			$min = $tab[0];
		$max = $tab[0];

		foreach ($tab as $value) {
			if ($min>$value) {
				$min = $value;
			}

			if ($max<$value) {
				$max = $value;
			}
		}
		echo "max = ".$max;
		echo "min = ".$min;
		echo "moy = ".($max+$min)/2;
		}



	?>

</body>
</html>