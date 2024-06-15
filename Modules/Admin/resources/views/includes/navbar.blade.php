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
        <a class="nav-link text-white" href="/admin">Admin</a>
      </li>                     
      <li class="nav-item">
        <a class="nav-link text-white" href="/authenticatie-login">Login</a>
      </li>              
      <li class="nav-item">
        <a class="nav-link text-white" href="/authenticatie-uitloggen">Log jezelf uit</a>
      </li>                          
      <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('users.create') }}">Voeg een admin toe pagina</a>
      </li>              
    </ul>
  </div>
</nav>
<!-- END NAVBAR -->