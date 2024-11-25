<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déclaration de Perte</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- CSS -->
    <style>
        /* Dégradé animé */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
            background: linear-gradient(270deg, #3498db, #8e44ad);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
            overflow: hidden;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Flocons de neige */
        .snowflake {
            position: absolute;
            color: white;
            font-size: 1em;
            top: -10px;
            animation: fall linear infinite;
            z-index: 1;
        }

        @keyframes fall {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }

            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }

        .snowflake:nth-child(odd) {
            animation-duration: 10s;
        }

        .snowflake:nth-child(even) {
            animation-duration: 7s;
        }

        .container {
            position: relative;
            z-index: 2;
        }

        .form-container {
            max-width: 800px;
            margin: auto;
        }

        .card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            border-radius: 15px 15px 0 0;
            text-align: center;
        }

        .btn-submit {
            background-color: #007bff;
            border: none;
            color: white;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            font-size: 1.1em;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div id="snowflakes-container"></div>

    <div class="container">
        <div class="form-container">
            <div class="image-container text-center">
                <img src="{{ url('img1.png') }}" alt="Image" class="center-image" style="max-width: 200px;">
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Déclaration de Perte</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('loss-report.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="numplaque" class="form-label">Numéro de Plaque</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-car"></i></span>
                                    <input type="text" class="form-control" name="numplaque" id="numplaque" required>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input type="text" class="form-control" name="telephone" id="telephone" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nom_victime" class="form-label">Nom du déclareur</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" name="nom_victime" id="nom_victime" required>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-submit" id="submitButton">
                            <span id="buttonText">Envoyer <i class="fas fa-paper-plane"></i></span>
                            <span id="buttonSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.querySelector("form").addEventListener("submit", function(event) {
            const submitButton = document.getElementById("submitButton");
            const buttonText = document.getElementById("buttonText");
            const buttonSpinner = document.getElementById("buttonSpinner");
            buttonText.style.display = "none";
            buttonSpinner.classList.remove("d-none");
            submitButton.disabled = true;
        });
        const snowflakesContainer = document.getElementById('snowflakes-container');

        function createSnowflake() {
            const snowflake = document.createElement('i');
            snowflake.classList.add('fas', 'fa-snowflake', 'snowflake');
            snowflake.style.left = Math.random() * window.innerWidth + 'px';
            snowflake.style.fontSize = Math.random() * 20 + 10 + 'px';
            snowflake.style.animationDuration = Math.random() * 5 + 5 + 's';
            snowflakesContainer.appendChild(snowflake);

            setTimeout(() => {
                snowflake.remove();
            }, 10000);
        }

        setInterval(createSnowflake, 200);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>