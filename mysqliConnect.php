<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<title>MySqli</title>

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
            background-color: #333;
            color: green;
            margin: 0 auto;
            width: 80%; /* Ajuster cette valeur pour augmenter ou diminuer la largeur */
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
            margin: 5px 0;
        }

        .input-custom::placeholder {
            color: green;
        }

        form {
            display: inline-block;
            margin-bottom: 20px;
        }

	</style>
	
</head>
<body>

	<canvas></canvas>

<?php

	$mysqli = new MySqli('localhost', 'root', '', 'voyage');

		if (isset($_GET['action']) && $_GET['action'] == 'modif') {

			$id = $_GET['id'];
			
			$selectWhere = $mysqli->query('select * from client where idclient='.$id);
			
			foreach ($selectWhere as $unselectWhere) {
			$nomModif = $unselectWhere['nomclient'];
			$prenomModif = $unselectWhere['prenom'];
			$villeModif = $unselectWhere['ville'];
			$regionModif = $unselectWhere['region'];
			$soldeModif = $unselectWhere['solde'];
			}
?>

	<form method="post">
		<label for="nom">NOM</label><br>
		<input type="text" name="nom" value="<?php echo $nomModif; ?>" class="input-custom"><br>
		<label for="prenom">PRENOM</label><br>
		<input type="text" name="prenom" value="<?php echo $prenomModif; ?>" class="input-custom"><br>
		<label for="ville">VILLE</label><br>
		<input type="text" name="ville" value="<?php echo $villeModif; ?>" class="input-custom"><br>
		<label for="region">REGION</label><br>
		<input type="text" name="region" value="<?php echo $regionModif; ?>" class="input-custom"><br>
		<label for="solde">SOLDE</label><br>
		<input type="text" name="solde" value="<?php echo $soldeModif; ?>" class="input-custom"><br>

		<input type="submit" name="modifier" value="Modifier" class="btn-custom">
		<input type="reset" name="annuler" value="Annuler" class="btn-custom">
	</form>

	<?php
		if (isset($_POST['modifier'])) {
			$modif = $mysqli->prepare('update client set nomclient=?, prenom=?, ville=?, region=?, solde=? where idclient=?');
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$ville = $_POST['ville'];
			$region = $_POST['region'];
			$solde = $_POST['solde'];
			$modif->execute([$nom, $prenom, $ville, $region, $solde, $id]);
			header('Location: mysqliConnect.php');
			exit();
		}
	} else {
	?>

	<form method="post">
		<label for="nom">NOM</label><br>
		<input type="text" name="nom" class="input-custom"><br>
		<label for="prenom">PRENOM</label><br>
		<input type="text" name="prenom" class="input-custom"><br>
		<label for="ville">VILLE</label><br>
		<input type="text" name="ville" class="input-custom"><br>
		<label for="region">REGION</label><br>
		<input type="text" name="region" class="input-custom"><br>
		<label for="solde">SOLDE</label><br>
		<input type="text" name="solde" class="input-custom"><br>

		<input type="submit" name="valider" value="Valider" class="btn-custom">
		<input type="reset" name="annuler" value="Annuler" class="btn-custom">
	</form>

	<table border="1" class="table-dark">
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
				$insert = $mysqli->prepare('insert into client(nomclient, prenom, ville, region, solde) values(?,?,?,?,?)');
				$insert->execute([$nom, $prenom, $ville, $region, $solde]);
				header('Location: mysqliConnect.php');
				exit();
			}

			$select = $mysqli->query('select * from client order by nomclient asc');
			foreach ($select as $unSelect) {
				echo "<tr><td>".$unSelect['nomclient']."</td>";
				echo "<td>".$unSelect['prenom']."</td>";
				echo "<td>".$unSelect['solde']."</td>";
				echo '<td><a href="mysqliConnect.php?id='.$unSelect['idclient'].'&action=modif"><img src="images/modif.png" width=25px></a><a href="mysqliConnect.php?idsuppr='.$unSelect['idclient'].'&action=supp"><img src="images/supp.png" width=25px></a></td></tr>';
			}

			if (isset($_GET['idsuppr']) && $_GET['action'] == 'supp') {
				$delete = $mysqli->query('delete from client where idclient='.$_GET['idsuppr']);
				header('Location: mysqliConnect.php');
				exit();
			}
		?>
	</table>

	<br>
	<a href="index.php" class="btn-custom">Accueil</a>

	<?php } ?>

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
