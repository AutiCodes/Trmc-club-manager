<!DOCTYPE html>
<html lang="nl">
	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!-- Page title -->
    <title>RC vliegtuig manager</title>
	  <!-- Bootstrap CSS -->
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	  <!-- tab icon -->
	  <link rel="icon" href="/media/images/TRMC_LOGO_PNG.ico" type="image/x-icon">
  </head>
	<body>
		<main>
			<!-- NAVBAR -->
			<nav class="navbar navbar-expand-lg navbar-light bg-dark">
				<a class="navbar-brand text-white" href="/">
					<img src="/media/images/TRMC_LOGO_PNG.ico" width="30" height="30" class="d-inline-block align-top" alt="">
					TRMC vlucht manager
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link text-white" href="/">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="/aanmeld-formulier">Vlucht aanmelden</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="/admin">Admin pagina</a>
						</li>                     
					</ul>
				</div>
			</nav>
			<!-- END NAVBAR -->
      
      <h1 class="text-center text-white font-weight-bold mt-4 mb-4">In ontwikkeling!</h1>
      <div class="container mt-4">
        <div class="row">	
          <!-- Text -->
          <div class="col-sm text-center text-white">
            <h3>Welkom bij de TRMC vlucht manager!</h3>
            <p>
              Dit is een website voor het aanmelden en het beheren van vluchten op het veld van TRMC.
              Deze website is nog vol in ontwikkeling. Het is dus mogelijk dat sommige functionaliteiten nog niet perfect zijn.
            </p>
            <hr>
            <p class="font-weight-bold">
              Hier beneden staat mijn contactinformatie om te mailen met evt problemen of suggesties:
            </p>
            <p>Email: <a href="mailto:webmaster@kelvincodes.nl">webmaster@kelvincodes.nl</a></p>
          </div>
          <!-- Image -->
          <div class="col-sm text-center">
            <img src="/media/images/Under_Construction_-_Webpage_or_Project_Under_Construction.jpg" alt="" class="img-fluid rounded" height="auto">
          </div>
        </div>
      </div>


      <!-- Footer -->
      <footer class="footer text-center mt-4">
        <p class="text-white">Copyright &copy; TRMC {{ date('Y') }}</p>
        <p class="text-white">Hosting & development door Kelvin de Reus</p>
      </footer>
		</main>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Google reCCHAPTA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    <!-- Temp styleing -->
    <style>
      body, html {
        background-color: #2f3031;
      }
    </style>
    <!-- Temp JS -->
    <script>
      function requiredHideViewer(e) {
        if(e.value != ''){
          document.getElementById(e.id + '_required').style.visibility = "hidden";
          return;
        }	
        document.getElementById(e.id + '_required').style.visibility = "visible";
      }
    </script>

	</body>
</html>