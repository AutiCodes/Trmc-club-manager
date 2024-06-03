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

            <!-- WHAT MODELS -->
            <div class="form-group">
              <label for="time" class="text-white font-weight-bold">Met welke modellen wil je gaan vliegen?</label>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value=1 id="CheckboxPlane" name="model_type[]" onclick="checkBoxes(this)">
                <label class="form-check-label text-white font-weight-bold ml-1" for="CheckboxPlane">
                  Gemotoriseerd modelvliegtuig
                </label>
              </div>
              <hr>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value=2 id="CheckboxGlider" name="model_type[]" onclick="checkBoxes(this)">
                <label class="form-check-label text-white font-weight-bold ml-2" for="CheckboxGlider">
                  Modelzweefvliegtuig
                </label>
              </div>
              <hr>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value=3 id="CheckBoxHelicopter" name="model_type[]" onclick="checkBoxes(this)">
                <label class="form-check-label text-white font-weight-bold ml-2" for="CheckBoxHelicopter">
                  Helicopter
                </label>
              </div>
              <hr>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value=4 id="CheckboxDrone" name="model_type[]" onclick="checkBoxes(this)">
                <label class="form-check-label text-white font-weight-bold ml-2" for="CheckboxDrone">
                  Drone
                </label>
              </div>    
              <hr>
              <p class="text-danger" id="model_type_required" style="display: block;">Model type(s) is vereist!</p>
            </div>

            <!-- PLANE -->
            <div id="CheckboxPlane_div" style="display: none;" class="bg-dark rounded pl-2 pr-2">
              <h3 class="text-white">Modelvliegtuig</h3>
              <!-- POWER TYPE -->
              <div class="form-group">
                <label for="power_type_select_plane" class="text-white font-weight-bold">Onder welke klasse ga je vliegen?</label>
                <select class="form-control" id="power_type_select_plane" name="power_type_select_plane" onchange="requiredHideViewer(this)">
                  <option disabled selected>Selecteer</option>
                  <option value=1>< 300W</option>
                  <option value=2>300W-1200W</option>
                  <option value=3>1200W-3000W</option>
                </select>
                <p class="text-danger" id="power_type_select_plane_required" style="display: block;">Klasse is vereist!</p>
              </div>
              <!-- LIPO COUNT --> 
              <div class="form-group">
                <label for="lipo_count_select_plane" class="text-white font-weight-bold">Aantal te verwachten vluchten (aantal Lipo's)</label>
                <select class="form-control" id="lipo_count_select_plane" name="lipo_count_select_plane" onchange="requiredHideViewer(this)">
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
                <p class="text-danger" id="lipo_count_select_plane_required" style="display: block;">Lipo aantal is vereist!</p>
              </div>
            </div>

            <!-- GLIDER -->
            <div id="CheckboxGlider_div" style="display: none;" class="bg-dark mt-3 rounded pl-2 pr-2">
              <h3 class="text-white">Modelzweefvliegtuig</h3>
              <!-- POWER TYPE -->
              <div class="form-group">
                <label for="power_type_select_glider" class="text-white font-weight-bold">Onder welke klasse ga je vliegen?</label>
                <select class="form-control" id="power_type_select_glider" name="power_type_select_glider" onchange="requiredHideViewer(this)">
                  <option disabled selected>Selecteer</option>
                  <option value=1>< 300W</option>
                  <option value=2>300W-1200W</option>
                  <option value=3>1200W-3000W</option>
                </select>
                <p class="text-danger" id="power_type_select_glider_required" style="display: block;">Klasse is vereist!</p>
              </div>
              <!-- LIPO COUNT --> 
              <div class="form-group">
                <label for="lipo_count_select_glider" class="text-white font-weight-bold">Aantal te verwachten vluchten (aantal Lipo's)</label>
                <select class="form-control" id="lipo_count_select_glider" name="lipo_count_select_glider" onchange="requiredHideViewer(this)">
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
                <p class="text-danger" id="lipo_count_select_glider_required" style="display: block;">Lipo aantal is vereist!</p>
              </div>
            </div>
            
            <!-- HELICOPTER -->
            <div id="CheckBoxHelicopter_div" style="display: none;" class="bg-dark mt-3 rounded pl-2 pr-2">
              <h3 class="text-white">Helicopter</h3>
              <!-- POWER TYPE -->
              <div class="form-group">
                <label for="power_type_select_helicopter" class="text-white font-weight-bold">Onder welke klasse ga je vliegen?</label>
                <select class="form-control" id="power_type_select_helicopter" name="power_type_select_helicopter" onchange="requiredHideViewer(this)">
                  <option disabled selected>Selecteer</option>
                  <option value=1>< 300W</option>
                  <option value=2>300W-1200W</option>
                  <option value=3>1200W-3000W</option>
                </select>
                <p class="text-danger" id="power_type_select_helicopter_required" style="display: block;">Klasse is vereist!</p>
              </div>
              <!-- LIPO COUNT --> 
              <div class="form-group">
                <label for="lipo_count_select_helicopter" class="text-white font-weight-bold">Aantal te verwachten vluchten (aantal Lipo's)</label>
                <select class="form-control" id="lipo_count_select_helicopter" name="lipo_count_select_helicopter" onchange="requiredHideViewer(this)">
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
                <p class="text-danger" id="lipo_count_select_helicopter_required" style="display: block;">Lipo aantal is vereist!</p>
              </div>              
            </div>
            
            <!-- DRONE -->
            <div id="CheckboxDrone_div" style="display: none;" class="bg-dark mt-3 rounded pl-2 pr-2">
              <h3 class="text-white">Drone</h3>
              <!-- POWER TYPE -->
              <div class="form-group">
                <label for="power_type_select_drone" class="text-white font-weight-bold">Onder welke klasse ga je vliegen?</label>
                <select class="form-control" id="power_type_select_drone" name="power_type_select_drone" onchange="requiredHideViewer(this)">
                  <option disabled selected>Selecteer</option>
                  <option value=1>< 300W</option>
                  <option value=2>300W-1200W</option>
                  <option value=3>1200W-3000W</option>
                </select>
                <p class="text-danger" id="power_type_select_drone_required" style="display: block;">Klasse is vereist!</p>
              </div>
              <!-- LIPO COUNT --> 
              <div class="form-group">
                <label for="lipo_count_select" class="text-white font-weight-bold">Aantal te verwachten vluchten (aantal Lipo's)</label>
                <select class="form-control" id="lipo_count_select_drone" name="lipo_count_select_drone" onchange="requiredHideViewer(this)">
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
                <p class="text-danger" id="lipo_count_select_drone_required" style="display: block;">Lipo aantal is vereist!</p>
              </div>
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


      <a class="help_icon text-white mr-3 " data-toggle="modal" data-target="#helpModal" >
        <img class="img-fluid" src="/media/images/help.ico" alt="help" style="width: 50px;"></img>
      </a>


      <!-- HELP MODAL -->
      <div class="modal fade" id="helpModal" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">

              <h5 class="modal-title" id="helpModalLabel">Hulp</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <!-- -->
              <h4>Uitleg voor het invullen van het formulier:</h4>
              <p>Het formulier is gemaakt om je te helpen om een vlucht te plannen. Het formulier bevat een aantal vragen die je moet beantwoorden om een vlucht te plannen. De vragen zijn als volgt:</p>
              <p>1. Wat is uw naam? (Vul uw voor en achternaam in)</p>
              <p>2. Wat is uw vliegdatum? (De datum waarop u gaat vliegen)</p>
              <p>3. Wat is uw vliegtijd? (De tijd waarop u gaat vliegen)</p>
              <p>4. Met welke modellen gaat u vliegen? (meerdere zijn mogelijk. Vul voor ieder model de klassen in lipo aantal in.)</p>

              <p class="text-danger">Let er goed op dat alles goed is ingevuld! De rode letters geven aan wat nog ingevuld moet worden</p>

              <!-- -->
              <span aria-hidden="true"></span>
              <h4>Errors en contact:</h4>
              <p>Lukt het aanmelden nog niet of komt er een error? Neem dan contact met ons op via prive@kelvincodes.nl of bel Kelvin de Reus: <a href="tel:123-456-7890">123-456-7890</a></p>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit</button>
            </div>
          </div>
        </div>
      </div>
  
  
      <!-- Footer -->
      <footer class="footer text-center">
        <p class="text-white">Copyright &copy; TRMC 2024</p>
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

      .help_icon {
          position: fixed;
          bottom:0;
          right: 0;
          padding: 10px;
      }

      input[type="checkbox"] {
        width: 1.2rem;
        height: 1.2rem;
        border-radius: 50%;
      }

      hr {
        padding-top: 1px;
        padding-bottom: 1px;
        background-color: #ffffff;
        margin-top: 5px;
        margin-bottom: 5px;
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

      function checkBoxes(e) {
        if (e.checked) {
          document.getElementById(e.id + '_div').style.display = "block";
          document.getElementById('model_type_required').style.visibility = "hidden";
        } else {
          document.getElementById(e.id + '_div').style.display = "none";
          document.getElementById('model_type_required').style.visibility = "visible";
          }
      }

      // Enabling tooltips everywhere
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>

	</body>
</html>