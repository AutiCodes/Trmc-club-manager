<!DOCTYPE html>
<html lang="nl">
	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!-- Page title -->
    <title>RC vliegtuig manager</title>
	  <!-- Bootstrap CSS -->
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	  <!-- tab icon -->
	  <link rel="icon" href="/media/images/TRMC_LOGO_PNG.ico" type="image/x-icon">
    <!-- graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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


      <!-- BEGIN ADMIN PAGE -->
      <!-- Total container-->
      <div class="container">
        <!-- Total -->
        <h1 class="text-white mt-4">Vluchten overzicht</h1>
        <!-- Total cards -->
        <div class="row">
          <!-- Total flights -->
          <div class="col-sm text-center bg-dark rounded ml-2 mr-2 mt-2">
            <h3 class="text-white mt-2">Totaal:</h3>
            <h1 class="text-white">{{ $FlightsTotal }}</h1>
          </div>
          <!-- This week flights -->
          <div class="col-sm text-center bg-dark rounded ml-2 mr-2 mt-2">
            <h3 class="text-white mt-2">Deze week:</h3>
            <h1 class="text-white">{{ $FlightsThisWeek }}</h1>
          </div>
          <!-- Today flights -->
          <div class="col-sm text-center bg-dark rounded ml-2 mr-2 mt-2">
            <h3 class="text-white mt-2">Vandaag:</h3>
            <h1 class="text-white">{{ $FlightsToday }}</h1>
          </div>                    
        </div>
        <!-- End total cards -->
      </div>


      <!-- Table last flights -->
      <div class="container">
        <h1 class="mt-4 text-white">Laatste 5 vluchten</h1>
        <div class="table-responsive">
          <table class="table table-striped table-hover text-white ml-2 mr-2">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Naam</th>
                <th scope="col">Datum</th>
                <th scope="col">Tijd</th>
                <th scope="col">Aantal lipo's</th>
                <th scope="col">Model type</th>
              </tr>
            </thead>
            <tbody>
              @foreach($formSubmissions as $submission)
                <tr>
                  <th scope="row">{{ $submission->id }}</th>
                  <td>{{ $submission->name }}</td>
                  <td>{{ explode(' ', $submission->date_time)[0] }}</td>
                  <td>{{ explode(' ', $submission->date_time)[1] }}</td>
                  <td>{{ $submission->lipo_count }}</td>
                  <td>{{ $submission->model_type }}</td>
                </tr>           
              @endforeach
            </tbody>
          </table>
        </div>
      </div>




      
      <!-- Graph container -->
      <div class="container">
        <h1 class="text-white mt-4">Grafieken</h1>
        <div class="row">
          <!-- Graph 1 -->
          <div class="col-sm bg-dark rounded ml-2 mr-2 mt-2">
            <p class="text-white">Vluchten laatste 30 dagen</p>
            <canvas id="ChartOne" style="width:100%;max-width:700px"></canvas>
            <script>
              const xValues = ['1 week', '2 weken', '3 weken', '4 weken'];
              const yValues = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30];
              const sampledata = [10, 5, 4, 3, 6, 19];
              new Chart("ChartOne", {
                type: "line",
                data: {
                  labels: xValues,
                  datasets: [{
                    backgroundColor:"rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: sampledata
                  }]
                },
                options:{
                  legend: {display: false}
                }
              });
            </script>
          </div>
          <!-- Graph 2 -->
          <div class="col-sm bg-dark rounded ml-2 mr-2 mt-2">
            <p class="text-white">Top 5 leden met de meeste vluchten</p>
            <canvas id="ChartTwo" style="width:100%;max-width:700px"></canvas>
            <script>
              var xNames = ["Wim", "Kelvin", "Madelief", "Tim", "Floor"];
              var yVal = [15, 13, 10, 7, 3];
              var barColors = ["red", "green","blue","orange","brown"];

              new Chart("ChartTwo", {
                type: "bar",
                data: {
                  labels: xNames,
                  datasets: [{
                    backgroundColor: barColors,
                    data: yVal
                  }]
                },
                options: {
                  legend: {display: false}
                }
              });
            </script>            
          </div>
        </div>
      </div>


      <!-- Administratie -->
      <div class="container mb-4">
        <h1 class="text-white mt-4">Administratie</h1>

        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle bg-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Exporteren naar PDF
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/pdf">Alle vluchten voor de gemeente</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Alle vluchten voor TRMC</a>
          </div>
        </div>
      </div>


      <!-- END ADMIN PAGE -->
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
	</body>
</html>