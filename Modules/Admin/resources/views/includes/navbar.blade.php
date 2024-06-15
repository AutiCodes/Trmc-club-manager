<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
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
      <li class="nav-item">
        <a class="nav-link text-white" href="/">Vluchten overzicht</a>
      </li>            
      <li class="nav-item">
        <a class="nav-link text-white" href="/">Leden/bestuur overzicht</a>
      </li>      
      <!-- TODO: align right -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Welkom {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Wijzig je profiel</a>
          <a class="dropdown-item" href="/authenticatie-uitloggen">Log jezelf uit</a>
        </div>
      </li>                                      
    </ul>
  </div>
</nav>
<!-- END NAVBAR -->