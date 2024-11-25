<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Suivre une Déclaration</title>
   <style>
      body {
         font-family: 'Arial', sans-serif;
         background-color: #f8f9fa;
         margin: 0;
         padding: 0;
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
      }

      .wrapper {
         display: flex;
         justify-content: center;
         align-items: center;
         width: 100%;
      }

      .card {
         background: #ffffff;
         border-radius: 12px;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         padding: 30px;
         width: 100%;
         max-width: 500px;
         position: relative;
      }

      .card-header {
         font-size: 1.5rem;
         font-weight: bold;
         text-align: center;
         margin-bottom: 20px;
         color: #333;
      }

      .card-body {
         padding: 0 10px;
      }

      label {
         font-size: 1rem;
         color: #555;
         margin-bottom: 5px;
         display: block;
      }

      .input-group {
         display: flex;
         align-items: center;
         margin-bottom: 15px;
         border: 1px solid #ced4da;
         border-radius: 5px;
         overflow: hidden;
      }

      .input-group-prepend {
         background-color: #e9ecef;
         padding: 10px 15px;
         font-size: 1rem;
         color: #6c757d;
      }

      .form-control {
         border: none;
         padding: 10px;
         font-size: 1rem;
         flex: 1;
      }

      .form-control:focus {
         outline: none;
         box-shadow: none;
      }

      .btn-primary {
         background-color: #007bff;
         border: none;
         padding: 10px 15px;
         font-size: 1rem;
         color: #fff;
         border-radius: 5px;
         cursor: pointer;
         transition: background-color 0.3s ease;
         width: 100%;
         max-width: 150px;
         display: block;
         margin: 20px auto 0;
         text-align: center;
      }

      .btn-primary:hover {
         background-color: #0056b3;
      }

      .loader {
         border: 4px solid #f3f3f3;
         border-top: 4px solid #007bff;
         border-radius: 50%;
         width: 50px;
         height: 50px;
         animation: spin 2s linear infinite;
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         display: none;
      }

      @keyframes spin {
         0% {
            transform: rotate(0deg);
         }

         100% {
            transform: rotate(360deg);
         }
      }

      .loading {
         pointer-events: none;
      }
      .alert-danger{
         color: red;
      }
      .alert-success
      {
         color: green;
      }
      li{
         text-decoration: none;
      }

   </style>
</head>

<body>
   <div class="wrapper">
      <div class="card">
         <div class="card-header">Suivre une Déclaration</div>
         <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
               <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success">
               {{ session('success') }}
            </div>
            @endif
            <form id="trackForm" method="POST" action="{{ route('loss-report.track') }}" onsubmit="showLoader()">
               @csrf
               <div class="form-group">
                  <label for="code_de_suivi">Code de suivi</label>
                  <div class="input-group">
                     <div class="input-group-prepend">N°</div>
                     <input type="text" id="code_de_suivi" name="code_de_suivi" class="form-control" required />
                  </div>
               </div>
               <button class="btn-primary" type="submit">Suivre</button>
            </form>
            
         </div>
      </div>
      <div id="loader" class="loader"></div>
   </div>

   <script>
      function showLoader() {
         document.getElementById("loader").style.display = "block";

         document.getElementById("trackForm").classList.add("loading");
      }
   </script>
</body>

</html>