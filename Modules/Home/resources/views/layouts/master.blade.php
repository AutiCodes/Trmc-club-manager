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

    <link rel="manifest" href="/manifest.json">

    {{-- Vite CSS --}}
    {{-- {{ module_vite('build-home', 'resources/assets/sass/app.scss') }} --}}
    @laravelPWA
  </head>

  <body>
    @include('home::includes.navbar')

    <main>
      @yield('content')

      @include('home::includes.footer')
    </main>

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
    </style>

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
  <script type="text/javascript">
    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/serviceworker.js', {
            scope: '.'
        }).then(function (registration) {
            // Registration was successful
            console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) {
            // registration failed :(
            console.log('Laravel PWA: ServiceWorker registration failed: ', err);
        });
    }
</script>
</html>