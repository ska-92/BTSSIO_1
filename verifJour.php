<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Les alternatives : Switch</title>
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
            background-color: rgba(0, 0, 0, 0);
            color: green;
            padding: 1px 20px;
        }

        .banner1 h1 {
            margin: 0;
            font-size: 3em;
            color: green;
        }

        .banner2 {
            background-color: rgba(0, 0, 0, 0);
            padding: 20px;
            color: green;
        }

        .banner2 p {
            font-size: 1.5em;
            color: green;
        }

        .quéstion {
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

        .btn-custom {
            background-color: black;
            color: green;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 10px;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            color: green;
        }

        input[type=text] {
            width: 7%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            background-color: black;
            color: green;
            border: 1px solid green;
        }

        .link-custom {
            background-color: black;
            color: green;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin: 10px 0;
        }

        .link-custom:hover {
            background-color: #0056b3;
            color: green;
        }


    </style>
</head>
<body>

    <canvas></canvas>

    <div class="banner1">
        <h1>Les alternatives : Switch</h1>
    </div>

    <div class="banner2">
        <h2>Ecrire un programme qui permet d'afficher si le jour séléctionné est travaillé ou de repos.</h2><br>
    </div>

    <form method="post">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Jour</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Lundi</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Mardi</cd>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Mercredi</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Jeudi</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Vendredi</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Samedi</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Dimanche</td>
                </tr>
            </tbody>
        </table>
        <br>

        <div class="quéstion">
        <label for="choix">Saisir le jour :</label><br>
        <input type="text" id="choix" name="choix"><br>
        <input type="submit" class="btn-custom" name="valider" value="VALIDER"><br><br>
      </div>

    </form>

    <div class="pipi">

    <?php
        if (isset($_POST["valider"])) {
            $choix = $_POST["choix"];
            switch ($choix) {
                case 1: case 2: case 3: case 4: case 5:
                    echo "<h2>jour de travail</h2>";
                    break;
                case 6: case 7:
                    echo "<h2>jour de repos</h2>";
                    break;
                default:
                    echo "<h1>erreur de saisi</h1>";
                    break;
            }
        }
    ?>

  </div>
  
    <br>
    <a href="index.php" class="link-custom">Accueil</a>

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
