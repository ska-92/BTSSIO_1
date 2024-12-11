<!DOCTYPE html>
<html>
<head>
	<title>BTS SIO 1</title>
</head>
<body>


	<h1>Exercices en PHP</h1><br>
	<h2>Conversion en secondes</h2>
	<h3>La solution de Bouloulou</h3>



<?php


	if (isset($_GET["valider"])) {

		$h = $_GET["heure"] ;
		$m = $_GET["minute"] ;
		$s = $_GET["seconde"] ;


		$hs = $h*3600;

		$ms = $m*60;

		$total = $hs + $ms + $s;


		printf("Conversion en seconde = %d <br>", $total);

		echo("Conversion en seconde = " .$total."<br>");


	}


?>


</body>
</html>