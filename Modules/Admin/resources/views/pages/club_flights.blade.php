@extends('admin::layouts.master')

@section('title', 'Admin vluchten beheren')

@section('content')
  <main>
    <!-- Total container-->
    <div class="container">
      <!-- Total -->
      <h1 class="text-white mt-4">Vluchten overzicht</h1>
      <!-- Total cards -->
      <div class="row">
        <!-- Total flights -->
        <div class="col-sm text-center bg-dark rounded ml-2 mr-2 mt-2">
          <h3 class="text-white mt-2">Totaal:</h3>
          <h1 class="text-white">{{ $totalFlights->total_flights }}</h1>
        </div>
        <!-- This week flights -->
        <div class="col-sm text-center bg-dark rounded ml-2 mr-2 mt-2">
          <h3 class="text-white mt-2">Deze week:</h3>
          <h1 class="text-white">{{ $flightsThisWeek->flightsThisWeek }}</h1>
        </div>
        <!-- Today flights -->
        <div class="col-sm text-center bg-dark rounded ml-2 mr-2 mt-2">
          <h3 class="text-white mt-2">Vandaag:</h3>
          <h1 class="text-white">{{ $flightsToday->flightsToday }}</h1>
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
              <th scope="col">Datum en tijd</th>
              <th scope="col">Model type(s) met lipo aantallen en vermogens</th>
            </tr>
          </thead>
          @foreach ($formSubmissions as $formSubmission)
            <tbody>
              <tr>
                <th scope="row">{{ $formSubmission->id }}</th>
                <td>{{ $formSubmission->member[0]->name }}</td>
                <td>{{ $formSubmission->date_time }}</td>
                <td>
                  @foreach ($formSubmission->submittedModels as $model)
                    <p class="mt-0 mb-0">
                      Model {{ $loop->iteration }}: {{$model->model_type}}. Lipo aantal: {{ $model->lipo_count }}. Model-vermogen: {{ $model->class }}
                    </p>
                  @endforeach 
                </td>
            </tbody>
          @endforeach
        </table>
      </div>
    </div>

    <!-- Administratie -->
    <div class="container mb-4">
      <h1 class="text-white mt-2">Administratie</h1>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle bg-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Exporteer vluchten
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="/downloadFlightsGov">Alle vluchten (laatste 365 dagen) voor de gemeente</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/downloadFlightsGov">Alle vluchten (laatste 365 dagen) voor TRMC</a>
        </div>
      </div>
    </div>

    <!-- Table members -->
    <div class="container">
      <h1 class="mt-4 text-white">Leden</h1>
      <div class="table-responsive">
        <table class="table table-striped table-hover text-white ml-2 mr-2">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Naam</th>
              <th scope="col">RDW nummer</th>
              <th scope="col">Tijd aangemaakt</th>
            </tr>
          </thead>
          @foreach($members as $member)
            <tbody>
              <tr>
                <th scope="row">{{ $member->id }}</th>
                <td>{{ $member->name }}</td>
                <td>{{ $member->rdw_number }}</td>
                <td>{{ $member->created_at }}</td>
                </tr>  
            </tbody>
          @endforeach
        </table>
      </div>
    </div>

    <!-- HELP ICON -->
    <a class="help_icon text-white mr-3" data-toggle="modal" data-target="#helpModal" >
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
            <h4>Uitleg voor het gebruiken van de admin pagina:</h4>
            <p>wip</p>
            <span aria-hidden="true"></span>
            <h4>Errors en contact:</h4>
            <p>Is er een error of lukt iets niet? Neem dan contact met ons op via Email: <a href="mailto:webmaster@kelvincodes.nl">webmaster@kelvincodes.nl</a></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit</button>
          </div>
        </div>
      </div>
    </div>
  </main>

  <style>
    body, html {
    background-color: #2f3031;
  }
  .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
    background-color: #ffffff;
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
  </style>
@stop