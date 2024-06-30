<!DOCTYPE html>
<html lang="nl">
	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!-- Page title -->
    <title>TRMC club manager</title>
	  <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	  <!-- tab icon -->
	  <link rel="icon" href="/media/images/TRMC_LOGO_PNG.ico" type="image/x-icon">
  </head>

	<body onload="init()">
		<main>
      @if (session()->has('error'))
        <div class="alert alert-success" role="alert">
          {{ session('error') }}
        </div>
      @endif
      <!-- LOGIN -->
      <div class="container bg-dark mt-4">
        <h3 class="text-white text-center pt-3">Login TRMC club manager</h3>
        <img src="/media/images/TRMC_LOGO_PNG.ico" class="rounded mx-auto d-block" alt="Responsive image">

        <form class="col-lg-6 offset-lg-3 pt-4 pb-4" action="/authenticatie-login-post" method="POST">
          @csrf
          <div class="form-group">
            <label for="username" class="text-white">Gebruikersnaam</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="username" placeholder="" required>
          </div>
          <div class="form-group">
            <label for="password" class="text-white">Wachtwoord</label>
            <input type="password" class="form-control mb-2" id="password" name="password" placeholder="Wachtwoord" required>
          </div>
          <!--
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          -->
          <button type="submit" class="btn btn-primary mb-4">Inloggen</button>
        </form>
      </div>
		</main>
    
    <div class="cookie_banner text-center" id="cookie_banner">
      <p class="text-dark pt-2">  
        Deze website gebruikt 
        <img src="/media/images/icons/cookie.png" style="width: 25px"></img> 
        (cookies).
        Door deze website te gebruiken ga je hier akkoord mee.
        <a href="#" class="btn btn-success" onclick="cookie_choice()">
          Akkoord
        </a>
      </p>
    </div>

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

      .cookie_banner {
        position: fixed;
        bottom: 0;
        padding-top: 5px;
        width: 100%;
        background: #FFFF00;
        color: #fff;
      }
    </style>

    <script>
      function init() {
        console.log('init');	
        if (localStorage.getItem('cookie_choice') == 'true') {
          document.getElementById('cookie_banner').style.display = 'none';
        }
      }

      function cookie_choice() {
        document.getElementById('cookie_banner').style.display = 'none';

        localStorage.setItem('cookie_choice', 'true');
      }
    </script>
	</body>
</html>