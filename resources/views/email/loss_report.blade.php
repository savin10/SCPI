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
            background-color: #f7f7f7;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        h1 {
            color: #343a40;
            text-align: center;
            font-size: 24px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
            color: #555;
        }

        .tracking-code {
            font-size: 20px;
            font-weight: bold;
            color: #ffffff;
            background-color: #6c757d;
            padding: 12px 25px;
            border-radius: 8px;
            display: inline-block;
            margin-top: 15px;
            text-align: center;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #888;
        }

        .button {
            background-color: #007BFF;
            color: #ffffff;
            padding: 12px 25px;
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
                font-size: 20px;
            }

            .tracking-code {
                font-size: 16px;
                padding: 10px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Déclaration de Perte</h1>
        <p>Bonjour {{ $name }},</p>
        <p>
            Merci de nous avoir informés de la perte de votre bien. Nous avons bien enregistré votre déclaration.
            Utilisez le code ci-dessous pour suivre l'évolution de votre demande :
        </p>
        <p>Votre <strong>code de suivi</strong> :</p>
        <div class="tracking-code">
            {{ $trackingCode }}
        </div>
    </div>
    <div class="footer">
        <p>
            Ce message a été généré automatiquement. Merci de ne pas répondre.
        </p>
    </div>
</body>

</html>
