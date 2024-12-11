
<form method="post">

	<input type="text" name="nbre">

	<input type="submit" name="valider" value="Valider">
	
</form>



<?php

	
	function div($nombre)
	{

		$cpt=0;

		for ($i=1; $i <= $nombre; $i++) { 
			$div = $nombre %$i;

			if ($div == 0) {
				$cpt += 1;
			}

		}

		return $cpt;
	}

	if (isset($_POST["valider"])) {
		$nombre = $_POST["nbre"];

		echo div($nombre);
	}


?>