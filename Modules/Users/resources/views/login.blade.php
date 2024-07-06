<!DOCTYPE html>
<html lang="nl">
	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!-- Page title -->
    <title>TRMC club manager</title>
	  <!-- Bootstrap CSS -->
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	  <!-- tab icon -->
	  <link rel="icon" href="/media/images/TRMC_LOGO_PNG.ico" type="image/x-icon">
  </head>
	<body>
		<main>
      @if (session()->has('error'))
        <div class="alert alert-success" role="alert">
          {{ session('error') }}
        </div>
      @endif
      <!-- LOGIN -->
      <div class="container mt-5" style="max-width: 400px;">
        <img src="/media/images/TRMC_LOGO.png" class="rounded mx-auto d-block" alt="" style="width: 150px;">
        <h2 class="text-white text-center pt-3">Inloggen</h2>

        <form class="col-auto pt-4 pb-4 mw-50" action="/authenticatie-login-post" method="POST">
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
          <button type="submit" class="btn mb-4" style="background-color: #d10014; color: #FFFFFF;">Inloggen</button>
        </form>

        @include('admin::includes.footer')
      </div>
		</main>

    <style>
      body, html {
        background-image: url("/media/images/plane.png");
        background-repeat: no-repeat;
        background-position: center;
        background-size: 60%;
        background-attachment: fixed;

        background-color: #2f3031;
      }    

      @media only screen and (max-width: 900px) {
        body, html {
          background-image: url("/media/images/plane.png");
          background-repeat: no-repeat;
          background-position: center;
          background-size: 100%;
          background-attachment: fixed;

          background-color: #2f3031;
        }
      }
    </style>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Google reCCHAPTA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
	</body>
</html>