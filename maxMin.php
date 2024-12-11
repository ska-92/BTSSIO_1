<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<title></title>

	<style>
		
		body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: black;
            color: #fff;
            text-align: center;
        }

        canvas {
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .banner1 {
            background-color: rgba(0, 0, 0, 0); /* Couleur noire avec transparence */
            color: green;
            padding: -10px 20px;
        }

        .banner1 h1 {
            margin: 0;
            font-size: 3em;
            color: green;
        }

        .banner2 {
            background-color: rgba(0, 0, 0, 0); /* Couleur noire avec transparence */
            padding: 20px;
            color: green;
        }

        .banner2 p {
            font-size: 1.5em;
            color: green;
        }

        .btn-custom {
            background-color: black;
            color: green;
            border: 1px solid green;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 10px;
        }

        .btn-custom:hover {
            background-color: black;
            color: green;
        }

        .table-dark {
            background-color: #000;
            color: green;
        }

        .table-dark th, .table-dark td {
            color: green;
            border-color: green;
        }

        .input-custom {
            background-color: black;
            color: green;
            border: 1px solid green;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .input-custom::placeholder {
            color: green;
        }

        .pipi {
            color: green;
        }

	</style>
</head>

<body>

	<canvas></canvas>

	<div class="banner1">
		<h1 style="color: black">Les tableaux</h1><br>
	</div>

	<div class="banner2">
		<h3>Ecrire en PhP un programme qui stocke dans un tableau 10 réels et affiche les valeurs extrêmes et le nombre moyen</h3><br>
	</div>

	<form method="post">
		<?php
			$i = 0;
			$tab = array();

			for ($i=0; $i < 10; $i++) { 
				echo "<input type='text' name='nbre".$i."' class='input-custom' placeholder='Saisir un entier'><br>";
			}
		?>

		<div class="pipi">
			<input type="submit" class="btn-custom" name="valider" value="Valider">
		</div>
	</form>

	<?php
		if (isset($_POST["valider"])) {
			for ($i=0; $i < 10; $i++) { 
				$nbre = $_POST["nbre".$i];
				$tab[$i] = $nbre;
			}
		}

		if($tab != null) {
			$min = $tab[0];
			$max = $tab[0];

			foreach ($tab as $value) {
				if ($min > $value) {
					$min = $value;
				}

				if ($max < $value) {
					$max = $value;
				}
			}

			echo "maximum = ".$max;
			echo "minimum = ".$min;
			echo "<br>somme = ".$min+$max;
			echo "<br>moyenne = ".($min+$max)/2;
		}
	?>

	<a href="index.php" class="btn-custom">Retour</a>

	<script>
		// Initialisation du canvas
		var canvas = document.querySelector('canvas'),
			ctx = canvas.getContext('2d');

		// Définir la largeur et la hauteur du canvas
		canvas.width = window.innerWidth;
		canvas.height = window.innerHeight;

		// Définir les lettres
		var letters = 'ABCDEFGHIJKLMNOPQRSTUVXYZABCDEFGHIJKLMNOPQRSTUVXYZABCDEFGHIJKLMNOPQRSTUVXYZABCDEFGHIJKLMNOPQRSTUVXYZABCDEFGHIJKLMNOPQRSTUVXYZABCDEFGHIJKLMNOPQRSTUVXYZ';
		letters = letters.split('');

		// Définir les colonnes
		var fontSize = 10,
			columns = canvas.width / fontSize;

		// Définir les gouttes
		var drops = [];
		for (var i = 0; i < columns; i++) {
			drops[i] = 1;
		}

		// Fonction de dessin
		function draw() {
			ctx.fillStyle = 'rgba(0, 0, 0, .1)';
			ctx.fillRect(0, 0, canvas.width, canvas.height);
			for (var i = 0; i < drops.length; i++) {
				var text = letters[Math.floor(Math.random() * letters.length)];
				ctx.fillStyle = '#0f0';
				ctx.fillText(text, i * fontSize, drops[i] * fontSize);
				drops[i]++;
				if (drops[i] * fontSize > canvas.height && Math.random() > .95) {
					drops[i] = 0;
				}
			}
		}

		// Lancer l'animation
		setInterval(draw, 33);
	</script>

</body>
</html>
