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
	  <!-- tab icon -->
	  <link rel="icon" href="/media/images/TRMC_LOGO_PNG.ico" type="image/x-icon">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>
	<body>
		<main>
      <!-- LOGIN -->
      <div class="container mt-4">
        <h3 class="text-white text-center pt-3">Meld je aan als een TRMC lid</h3>
        @if (session()->has('success'))
          <div class="alert alert-success" role="alert">
              {{ session('success') }}
          </div>
        @endif
        @if (session()->has('error'))
          <div class="alert alert-danger" role="alert">
              {{ session('error') }}
          </div>
        @endif        
        <img src="/media/images/TRMC_LOGO_PNG.ico" class="rounded mx-auto d-block" alt="Responsive image">

        <form class="col-lg-6 offset-lg-3 pt-4 pb-4" action="{{ route('newMembers.store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="firstname" class="text-white">Voornaam</label>
            <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="firstname" placeholder="" required>
          </div>

          <div class="form-group">
            <label for="lastname" class="text-white">Achternaam</label>
            <input type="text" class="form-control mb-2" id="lastname" name="lastname" placeholder="" required>
          </div>

          <div class="form-group">
            <label for="address" class="text-white">Adres</label>
            <input type="text" class="form-control mb-2" id="address" name="address" placeholder="" required>
          </div>
          
          <div class="form-group">
            <label for="city" class="text-white">Woonplaats</label>
            <input type="text" class="form-control mb-2" id="city" name="city" placeholder="" required>
          </div>
          
          <div class="form-group">
            <label for="postcode" class="text-white">Postcode</label>
            <input type="text" class="form-control mb-2" id="postcode" name="postcode" placeholder="" required>
          </div>
          
          <div class="form-group">
            <label for="email" class="text-white">Email</label>
            <input type="email" class="form-control mb-2" id="email" name="email" placeholder="" required>
          </div>          

          <div class="form-group">
            <label for="phone" class="text-white">Telefoonnummer</label>
            <input type="phone" class="form-control mb-2" id="phone" name="phone" placeholder="" required>
          </div>    

          <div class="form-group">
            <label for="birthdate" class="text-white">Geboortedatum</label>
            <input type="date" class="form-control mb-2" id="birthdate" name="birthdate" placeholder="" required>
          </div>          
          
          <div class="form-group">
            <label for="nationality" class="text-white">Nationaliteit</label>
            <input type="text" class="form-control mb-2" id="nationality" name="nationality" placeholder="" required>
          </div>          
                    
          <div class="form-group">
            <label for="nationality" class="text-white">Welke brevetten gehaald</label>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value=1 id="glider_brevet_a" name="glider_brevet_a">
              <label class="form-check-label text-white" for="glider_brevet_a">
              Zweef brevet A
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value=1 id="motor_brevet" name="motor_brevet">
              <label class="form-check-label text-white" for="motor_brevet">
              Motor brevet A
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value=1 id="heli_brevet" name="heli_brevet">
              <label class="form-check-label text-white" for="heli_brevet">
              Heli brevet A
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value=1 id="drone_a1_a3" name="drone_a1_a3">
              <label class="form-check-label text-white" for="drone_a1_a3">
              Drone EU A1/A3
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value=1 id="drone_a2" name="drone_a2">
              <label class="form-check-label text-white" for="drone_a2">
              Drone EU A2
              </label>
            </div>           
          </div>          

          <div class="form-group">
            <label for="rdw_number" class="text-white">RDW registratienummer (als je dat hebt)</label>
            <input type="text" class="form-control mb-2" id="rdw_number" name="rdw_number" placeholder="">
          </div>          

          <div class="form-group">
            <label for="member_other_club" class="text-white">Ben je lid van een andere club?</label>
            <select class="form-select" aria-label="member_other_club" id="member_other_club" name="member_other_club" required onchange="otherClub(this)">
              <option selected>Selecteer...</option>
              <option value=1>Ja</option>
              <option value=0>Nee</option>
            </select>
          </div>
          
          <div class="mt-2" id="if_yes_other_club" style="display: none;">
            <div class="form-group">
              <label for="if_yes_other_club" class="text-white">Welke vliegclub ben je lid van?</label>
              <input type="text" class="form-control mb-2" id="if_yes_other_club" name="if_yes_other_club" placeholder="">
            </div>         
          </div>

          <div class="form-group mt-2">
            <label for="knvvl_select" class="text-white">K.N.V.v.l</label>
            <select class="form-select" aria-label="knvvl_select" id="knvvl_select" name="knvvl_select" required onchange="knvvl(this)">
              <option selected>Selecteer...</option>
              <option value=1>Wel lid</option>
              <option value=0>Geen lid</option>
            </select>
          </div>
          
          <div class="mt-2" id="if_yes_knvvl" style="display: none;">
            <div class="form-group">
              <label for="if_yes_knvvl" class="text-white">K.N.V.v.l registratienummer</label>
              <input type="text" class="form-control mb-2" id="if_yes_knvvl" name="if_yes_knvvl" placeholder="">
            </div>         
          </div>

          <div class="form-group">
            <label for="wanna_be_member_at" class="text-white">Ik wil lid worden van de T.R.M.C per</label>
            <input type="date" class="form-control mb-2" id="wanna_be_member_at" name="wanna_be_member_at" placeholder="" required>
          </div>     

          <!--
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          -->
          <p class="text-white">Bovenstaande heb ik naar waarheid ingevuld.</p>
          
          <button type="submit" class="btn btn-primary mb-4 mt-3">Verzenden</button>
        </form>

      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

		</main>

    <!-- Temp styleing -->
    <style>
      body, html {
        background-color: #2f3031;
      }
    </style>
    <!-- Temp JS -->
    <script>
      function otherClub(e) {
        
        var div = document.getElementById("if_yes_other_club");

        if (e.value == 1) {
          div.style.display = "block";
        } else {
          div.style.display = "none";
        }
      }

      function knvvl(e) {
        
        var div = document.getElementById("if_yes_knvvl");

        if (e.value == 1) {
          div.style.display = "block";
        } else {
          div.style.display = "none";
        }
      }      
    </script>

	</body>
</html>