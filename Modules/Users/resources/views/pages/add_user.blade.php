@extends('admin::layouts.master')

@section('title', 'Voeg een admin toe aan de vlucht manager')


@section('content')
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

  <!-- Add new member -->
  <div class="container bg-dark mt-4 w-25">
    <img src="/media/images/TRMC_LOGO_PNG.ico" class="rounded mx-auto d-block" alt="Responsive image">
    <h3 class="text-white text-center pt-3">Voeg een admin toe aan de vlucht manager</h3>
    <form action="{{ route('users.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name" class="text-white">Naam:</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Voornaam Achternaam" required>
      </div>          
      <!-- NAME -->
      <div class="form-group">
        <label for="username" class="text-white">Gebruikersnaam:</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Gebruikersnaam" required>
      </div>
      <!-- RDW number -->
      <div class="form-group">
        <label for="password" class="text-white">Wachtwoord:</label>
        <input type="password" class="form-control" id="password" name="password" aria-describedby="password" placeholder="password" required>
      </div>          
      <button type="submit" class="btn btn-primary mb-4">Toevoegen</button>
    </form>
  </div>

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
  @endsection