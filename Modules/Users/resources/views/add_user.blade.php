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
						<li class="nav-item">
							<a class="nav-link text-white" href="/authenticatie">Login pagina</a>
						</li>       
						<li class="nav-item">
							<a class="nav-link text-white" href="{{ route('users.create') }}">Voeg een admin toe pagina</a>
						</li>                                            
					</ul>
				</div>
			</nav>
			<!-- END NAVBAR -->

      @if ($errors->any())
          <div class="alert alert-danger">
            <h1>Oeps!</h1>
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        @if (session()->has('success'))
          <div class="alert alert-success" role="alert">
              {{ session('success') }}
          </div>
        @endif

      <!-- Add new member -->
      <div class="container bg-dark mt-4 w-25">
        <img src="/media/images/TRMC_LOGO_PNG.ico" class="rounded mx-auto d-block" alt="Responsive image">
        <h3 class="text-white text-center pt-3">Voeg een admin toe aan de vlucht manager</h3>
        <form action="{{ route('users.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="name" class="text-white">Naam:</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Voornaam Achternaam" required>
          </div>          
          <!-- NAME -->
          <div class="form-group">
            <label for="username" class="text-white">Gebruikersnaam:</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Gebruikersnaam" required>
          </div>
          <!-- RDW number -->
          <div class="form-group">
            <label for="password" class="text-white">Wachtwoord:</label>
            <input type="password" class="form-control" id="password" name="password" aria-describedby="password" placeholder="password" required>
          </div>          
          <button type="submit" class="btn btn-primary mb-4">Toevoegen</button>
        </form>
      </div>

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