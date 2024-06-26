<!-- NAVBAR -->
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand text-white" href="/">
    <img src="/media/images/TRMC_LOGO_PNG.ico" width="30" height="30" class="d-inline-block align-top" alt="">
    TRMC club manager
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" href="/">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Vluchten
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('admin.index') }}">Overzicht</a>
          <a class="dropdown-item" href="/downloadFlightsGov">Alle vluchten (laatste 365 dagen) voor de gemeente</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Leden/bestuur
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('members.index') }}">Leden overzicht</a>
          <a class="dropdown-item" href="{{ route('members.create') }}">Vlieg lid toevoegen</a>
        </div>
      </li>         
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Systeem
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('versions.index') }}">Versies</a>
          <a class="dropdown-item" href="{{ route('users.create') }}">Voeg een bestuurslid toe</a>
          <a class="dropdown-item" href="{{ route('users.index') }}">Alle bestuurleden account</a>
        </div>
      </li>       
    </ul>

    <ul class="navbar-nav ml-auto"> 
      <li class="nav-item dropdown mr-3">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Welkom {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('users.edit', auth()->user()->id) }}">Wijzig je profiel</a>
          <a class="dropdown-item" href="/authenticatie-uitloggen">Log jezelf uit</a>
        </div>
      </li>  
    </ul> 
  </div>
</nav>
<!-- END NAVBAR -->