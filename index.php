<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercices BTS SIO 1ère année</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
            background-color: rgba(0, 0, 0, 0); /* Couleur bleue avec transparence */
            color: green;
            padding: 150px 20px;
        }

        .banner1 h1 {
            margin: 0;
            font-size: 3em;
            color: green;
        }

        .banner2 {
            background-color: rgba(0, 0, 0, 0); /* Couleur noire avec transparence */
            padding: 20px;
        }

        .banner2 p {
            font-size: 1.5em;
            color: green;
        }

        .button-container {
            margin: 20px 0;
        }

        .button-container .btn {
            margin: 10px;
            background-color: black;
            color: green;
        }

        #hiddenButton {
            display: none;
            background-color: black;
            border: none;
            color: green;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
        }

        #openModalButton {
            background-color: black;
            border: none;
            color: green;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        #passwordModal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        #modalContent {
            background-color: black;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 300px;
            text-align: center;
            border-radius: 10px;
        }

        #passwordInput {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            width: calc(100% - 22px);
        }

        #submitPassword {
            background-color: black;
            border: none;
            color: green;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <canvas></canvas>

    <div class="banner1">
        <h1>Exercices BTS SIO 1ère année</h1>
    </div>

    <div class="banner2">
        <p>Vous trouverez ici tous les exercices en PHP de cette première année de BTS SIO. Il suffit de cliquer sur les liens ci-dessous pour y accéder.</p>
    </div>

    <div class="button-container">
        
        <button type="button" class="btn" onclick="window.location='listeImpair.php'">Les boucles</button>
        
        <button type="button" class="btn" onclick="window.location='verifJour.php'">Les alternatives : SWITCH</button>
        
        <button type="button" class="btn" onclick="window.location='pairImpair.php'">Les alternatives : IF</button>
        
        <button type="button" class="btn" onclick="window.location='maxMin.php'">Les tableaux 1</button>
        
        <button type="button" class="btn" onclick="window.location='tableauxExercice.php'">Les tableaux 2</button>
        
        <button type="button" class="btn" onclick="window.location='mysqliConnect.php'">Mysqli</button>
        
        <button id="openModalButton">???</button>
        
        <button id="hiddenButton" onclick="window.location='https://youtu.be/dQw4w9WgXcQ'">Bouton Mystère</button>
    
    </div>

    <div id="passwordModal">
        <div id="modalContent">
            <input type="password" id="passwordInput" placeholder="Entrer le nom du meilleur prof">
            <br>
            <button id="submitPassword">Valider</button>
        </div>
    </div>

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

        document.getElementById('openModalButton').onclick = function () {
            document.getElementById('passwordModal').style.display = 'block';
        }

        document.getElementById('submitPassword').onclick = function () {
            const password = document.getElementById('passwordInput').value;
            const correctPassword = 'Stakic'; // Change this to your desired password

            if (password === correctPassword) {
                document.getElementById('hiddenButton').style.display = 'inline-block';
                document.getElementById('passwordModal').style.display = 'none';
            } else {
                alert('Incorrect password. Please try again.');
            }
        }

        window.onclick = function (event) {
            if (event.target == document.getElementById('passwordModal')) {
                document.getElementById('passwordModal').style.display = 'none';
            }
        }
    </script>
</body>

</html>
