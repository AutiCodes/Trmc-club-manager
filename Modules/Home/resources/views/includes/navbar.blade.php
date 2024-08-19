<!-- NAVBAR -->
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand text-white ms-2" href="/">
    <img src="/media/images/TRMC_LOGO_PNG.ico" width="30" height="30" class="d-inline-block align-top" alt="">
    TRMC club manager
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('home.index') }}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('form.index') }}">Vlucht aanmelden</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="{{ route('admin.index') }}">Voor het bestuur</a>
      </li>                     
    </ul>
  </div>
</nav>
<!-- END NAVBAR -->