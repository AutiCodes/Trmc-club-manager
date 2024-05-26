<!-- 
In development by KelvinCodes for TRMC.nl
-->
<!DOCTYPE html>
<html lang="nl">
	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!-- Page title -->
    <title>Vlucht manager</title>
	  <!-- Bootstrap CSS -->
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	  <!-- tab icon -->
	  <link rel="icon" href="/media/images/TRMC_LOGO_PNG.ico" type="image/x-icon">
  </head>
	<body>
		<main>      
			<!-- NAVBAR -->
      <!--
			<nav class="navbar navbar-expand-lg navbar-light bg-dark">
				<a class="navbar-brand text-white" href="#">
					<img src="/media/images/TRMC_LOGO_PNG.ico" width="30" height="30" class="d-inline-block align-top" alt="">
					TRMC vlucht manager
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link text-white" href="/index.html">Home</a>
						</li>
						<li class="nav-item active">
							<a class="nav-link text-white" href="/form.html">Vlucht aanmelden</a>
						</li>
						<li class="nav-item active">
							<a class="nav-link text-white" href="/admin.html">Admin pagina</a>
						</li>      
						<li class="nav-item active">
							<a class="nav-link text-white" href="/login.html">Login pagina</a>
						</li>                        
					</ul>
				</div>
			</nav>
      -->
			<!-- END NAVBAR -->


      <!-- BEGIN FLIGHT SUBMISSION FORM --> 
      <div class="container mt-4 mb-4">
        <!-- Error or success reporting -->
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
        <!-- End error or success reporting -->
        <form class="col-lg-6 offset-lg-3 pt-4 pb-4" id="plane_submittion" action="{{ route('form.store') }}" method="POST">
          @csrf
          <div class="justify-content-center">
            <!-- TOP TEXT AND IMAGE -->
            <img src="/media/images/field.jpg" class="img-fluid rounded mt-3">
            <h2 class="text-white text-center pt-3 pb-3">Registratie aanvang modelvliegen TRMC</h2>
            <!-- NAME -->
            <div class="form-group">
              <label for="name" class="text-white font-weight-bold">Naam modelvlieger:</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Voornaam Achternaam" required oninput="requiredHideViewer(this)">
              <p class="text-danger" id="name_required" style="display: block;">Naam is vereist!</p>
            </div>
            <!-- DATE -->
            <div class="form-group">
              <label for="date" class="text-white font-weight-bold">Selecteer een datum:</label>
              <input type="date" id="date" name="date" class="form-control" required onchange="requiredHideViewer(this)">  
              <p class="text-danger" id="date_required" style="display: block;">Datum is vereist!</p>
            </div>					
            <!-- TIME -->
            <div class="form-group">
              <label for="time" class="text-white font-weight-bold">Selecteer een tijd:</label>
              <input type="time" id="time" name="time" class="form-control" required onchange="requiredHideViewer(this)">  
              <p class="text-danger" id="time_required" style="display: block;">Tijd is vereist!</p>
            </div>
            <!-- PLANE TYPE -->
            <div class="form-group">
              <label for="plane_type_select" class="text-white font-weight-bold">Type model (electro uitsluitend)</label>
              <select class="form-control" id="plane_type_select" name="plane_type_select" required onchange="requiredHideViewer(this)">
                <option disabled selected>Selecteer</option>
                <option value=1>Gemotoriseerd Modelvliegtuig</option>
                <option value=2>Modelzweefvliegtuig</option>
                <option value=3>Helikopter</option>
                <option value=4>Drone</option>
              </select>
              <p class="text-danger" id="plane_type_select_required" style="display: block;">Type model is vereist!</p>
            </div>
            <!-- LIPO COUNT -->
            <div class="form-group">
              <label for="lipo_count_select" class="text-white font-weight-bold">Aantal te verwachten vluchten (aantal Lipo's)</label>
              <select class="form-control" id="lipo_count_select" name="lipo_count_select" q  required onchange="requiredHideViewer(this)">
                <option disabled selected>Selecteer</option>
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
                <option value=6>6</option>
                <option value=7>7</option>
                <option value=8>8</option>
              </select>
              <p class="text-danger" id="lipo_count_select_required" style="display: block;">Lipo aantal is vereist!</p>
            </div>
          </div>
          <!-- reCAPTCHA -->
          <!--
          <div class="g-recaptcha pb-3" id="rcaptcha" data-sitekey="6Ldwq90pAAAAAJuxavmVQjPKHSpGYoRRx5aUhn9x"></div>
          <span id="captcha" style="color:red"></span> 
          -->
          <!-- SEND FORM BUTTON -->
          <button type="submit" class="btn btn-success font-weight-bold" data-toggle="modal" data-target="#exampleModalCenter">Verzenden</button>
        </form>
        <!-- END FLIGHT SUBMISSION FORM -->
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