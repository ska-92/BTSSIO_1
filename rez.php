<?php

	if (isset($_GET["valider"])) {


		$nbre = $_GET["nbre"];


		for ($i=1; $i <= $nbre; $i++) { 


			$div = $nbre %$i;

			if ($div == 0) {
				
				echo $i."<br>";	

			}


		}


	}

	?>

	<a href="test.php">Retour</a>