<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identifiants de Connexion</title>
    <style>
        /* Styles de base */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-wrapper {
            background-color: #ffffff;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            border: 2px solid #007bff; /* Couleur du cadre principal */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            text-align: center;
        }
        .content {
            font-size: 16px;
            line-height: 1.6;
            margin-top: 20px;
        }
        .content strong {
            color: #333;
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 24px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #666;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="header">
            Vos Identifiants de Connexion
        </div>
        <div class="content">
            Bonjour {{ $user->username }},
            <br><br>
            Votre compte a été créé avec succès. Voici vos informations de connexion :
            <br><br>
            - <strong>Nom d'utilisateur :</strong> {{ $user->username }}<br>
            - <strong>Mot de passe :</strong> {{ $plainPassword }}
            <br><br>
            <a href="{{ route('login') }}" class="button"> Clique pour vous connecter</a>
        </div>
        <div class="footer">
            Si vous rencontrez des problèmes de connexion, n'hésitez pas à nous contacter.
            <br><br>
            Merci,<br>
            {{ config('app.name') }}
        </div>
    </div>
</body>
</html>
