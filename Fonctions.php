<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<form method="post">


		<input type="text" name="nbre">

		<input type="submit" name="valider" value="Valider">
		

	</form>

	<?php

	function fact($nombre)
	{
		$fact = 1;

		for ($i=1; $i <= $nombre; $i++) { 
			$fact = $fact*$i;
		}

		return $fact;
	}

	if (isset($_POST['valider'])) {
		$nombre = $_POST['nbre'];
		
		echo fact($nombre);
	}



	?>



</body>
</html>