<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statut de votre Déclaration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #e3f2fd, #ffffff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
        }

        .card-header {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .btn-primary {
            border-radius: 25px;
            font-weight: bold;
            padding: 10px 30px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h2>Statut de votre Déclaration</h2>
            </div>
            <div class="card-body">
                <!-- Affichage sur une seule ligne -->
                <div class="d-flex align-items-center justify-content-between">
                    <p><strong>Numéro de Plaque :</strong> <span class="text-info">{{ $lossReport->numplaque }}</span></p>
                    <p><strong>Description :</strong> <span class="text-muted">{{ $lossReport->description }}</span></p>
                    <p>
                        <strong>Statut :</strong>
                        <span class="{{ $lossReport->status == 'Validée' ? 'text-success' : 'text-warning' }}">
                            {{ $lossReport->status }}
                        </span>
                    </p>
                </div>

                <!-- Bouton de retour -->
                <div class="text-center mt-4">
                    <a href="{{ route('loss-report.trackForm') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
