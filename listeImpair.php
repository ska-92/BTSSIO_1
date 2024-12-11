<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Pair ou impair</title>
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
        }

        .banner2 p {
            font-size: 1.5em;
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
            color:green
        }
    </style>
</head>
<body>

    <canvas></canvas>

    <div class="banner1">
        <h1>Les boucles</h1>
    </div>

    <div class="banner2">
        <p>Écrire un programme qui affiche les nombres pairs compris entre 2 et 20.</p>
    </div>

    <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th>Avec la boucle WHILE</th>
                <th>Avec la boucle FOR</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <?php
                        $nbre = 2;
                        while ($nbre >= 2 && $nbre <= 20) {
                            $resultat = $nbre % 2;
                            if ($resultat == 0) {
                                echo $nbre."<br>";
                            }
                            $nbre++;
                        }
                    ?>
                </td>
                <td>
                    <?php
                        for ($i = 2; $i <= 20; $i++) {
                            $resultat = $i % 2;
                            if ($resultat == 0) {
                                echo $i."<br>";
                            }
                        }
                    ?>
                </td>
            </tr>
        </tbody>
    </table>

    <br>
    <a href="index.php" class="btn btn-custom">Accueil</a>

    <script>
        // Initialisation du canvas
        var canvas = document.querySelector('canvas'),
            ctx = canvas.getContext('2d');

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }

        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        // Définir les lettres
        var letters = 'ABCDEFGHIJKLMNOPQRSTUVXYZ'.repeat(10).split('');

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
