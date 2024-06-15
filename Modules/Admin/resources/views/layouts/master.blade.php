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
  
  {{-- Vite CSS --}}
  {{-- {{ module_vite('build-admin', 'resources/assets/sass/app.scss') }} --}}
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

  @yield('content')

  @include('admin::includes.footer')

  @include('admin::includes.scripts')

  {{-- Vite JS --}}
  {{-- {{ module_vite('build-admin', 'resources/assets/js/app.js') }} --}}
  
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
</body>
