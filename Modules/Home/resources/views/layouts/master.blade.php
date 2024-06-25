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

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  
  @include('home::includes.head')

  {{-- Vite CSS --}}
  {{-- {{ module_vite('build-home', 'resources/assets/sass/app.scss') }} --}}
</head>

<body>
  @include('home::includes.navbar')

  <main>
    @yield('content')

    @include('home::includes.footer')
  </main>

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




  <!-- Google reCCHAPTA -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  {{-- Vite JS --}}
  {{-- {{ module_vite('build-home', 'resources/assets/js/app.js') }} --}}
</body>
