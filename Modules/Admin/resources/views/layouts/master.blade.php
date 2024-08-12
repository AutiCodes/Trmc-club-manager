<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>@yield('title')</title>

  <meta name="description" content="{{ $description ?? '' }}">
  <meta name="keywords" content="{{ $keywords ?? '' }}">
  <meta name="author" content="{{ $author ?? '' }}">

  @include('admin::includes.head')
  
  <!-- Favicon -->
  <link rel="icon" href="/media/images/TRMC_LOGO_PNG.ico" type="image/x-icon">

  {{-- Vite CSS --}}
  {{-- {{ module_vite('build-admin', 'resources/assets/sass/app.scss') }} --}}
  @laravelPWA
</head>

<body>
  @include('admin::includes.navbar')
  
  <!-- Errors -->
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

  @if (session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
  @endif


  @yield('content')

  @include('admin::includes.footer')

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- Google reCCHAPTA -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  
  {{-- Vite JS --}}
  {{-- {{ module_vite('build-admin', 'resources/assets/js/app.js') }} --}}
  
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
</body>
