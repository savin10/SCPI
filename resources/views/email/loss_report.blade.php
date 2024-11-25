<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déclaration de Perte</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #4CAF50;
            text-align: center;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .tracking-code {
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
            background-color: #007BFF;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 15px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }

        .button {
            background-color: #007BFF;
            color: #ffffff;
            padding: 12px 20px;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 24px;
            }

            .tracking-code {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Déclaration de Perte - Code de Suivi</h1>
        <p>Bonjour {{ $name }},</p>
        <p>Merci de nous avoir informés de la perte de votre véhicule. Nous avons bien enregistré votre déclaration et votre
            code de suivi est désormais prêt. Utilisez-le pour suivre l'évolution de votre demande.</p>
        <p>Voici votre <strong>code de suivi</strong> :</p>
        <div class="tracking-code">
            {{ $trackingCode }}
        </div>

        <p>Vous pouvez utiliser ce code pour vérifier l'état de votre déclaration et suivre l'avancement de votre dossier.</p>
        
        <p>Si vous avez des questions ou besoin d'assistance supplémentaire, n'hésitez pas à nous contacter.</p>


        <div class="footer">
        <p>Ce message à été générer automatiquement. Nous vous remercions de ne pas répondre</p>
        </div>
    </div>
</body>

</html>
