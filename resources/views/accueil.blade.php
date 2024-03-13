<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Accueil police</title>

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="page-index">

  <!-- ======= Header ======= -->
  <header id="header" class="header btn-primary d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="#" class="logo d-flex align-items-center">
        <h1 class="d-flex align-items-center">Portail de la police républicaine</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#" class="active">Accueil</a></li>
          <!-- <li><a href="{{ route('register') }}"><div class="btn btn-outline-danger">Inscription</div></a></li>-->
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-xl-4">
          <h2 data-aos="fade-up">Portail de la police républicaine</h2>
          <blockquote data-aos="fade-up" data-aos-delay="100">
            <p>La sécurité est notre priorité. Nous sommes là pour vous aider à retrouver vos biens perdus. Faites-nous confiance pour vous accompagner dans ces moments difficiles.</p>
          </blockquote>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('accueil.admin') }}" class="btn-get-started">Se connecter</a>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    
  
    <div class="footer-legal">
      <div class="container">
        <div class="copyright">
          &copy; 2023 Police républicaine. Tous droits réservés
        </div>
        
      </div>
    </div>
  </footer><!-- End Footer -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
