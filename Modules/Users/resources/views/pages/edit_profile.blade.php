@extends('admin::layouts.master')	

@section('title', 'Profiel van: ' .  $user->name)

@section('content')	
<div class="container">
  <form class="col-lg-6 offset-lg-3 pt-3 pb-3 ps-3 pe-3 bg-dark mt-4 rounded bg-opacity-75" action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <h4 class="text-white">Account details van: {{ $user->name }}</h4>

    <hr style="color:aliceblue; background-color: white;">
    
    <h6 class="text-white">Details</h6>

    <!-- Name -->
    <div class="form-group">
      <input type="hidden" id="old_name" name="old_name" value="{{ $user->name }}"> 
      <label for="name" class="text-white font-weight-bold">Voornaam Achternaam</label>
      <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="" value="{{ $user->name }}">
    </div>

    <!-- Username -->
    <div class="form-group mt-2">
      <input type="hidden" id="old_username" name="old_username" value="{{ $user->username }}"> 
      <label for="username" class="text-white font-weight-bold">Gebruikersnaam</label>
      <input type="username" class="form-control" id="username" name="username" aria-describedby="username" placeholder="" value="{{ $user->username }}">
    </div>

    <h6 class="text-white mt-3 pb-0">Wachtwoord</h6>

    <!-- Password -->
    <div class="form-group">
      <label for="password" class="text-white font-weight-bold">Nieuw wachtwoord</label>
      <input type="password" class="form-control" id="password" name="password" aria-describedby="password" placeholder="">
    </div>

    <!-- Password -->
    <div class="form-group mt-2">
      <label for="password2" class="text-white font-weight-bold">Wachtwoord voor een 2e keer invullen als bevestiging</label>
      <input type="password" class="form-control" id="password2" name="password2" aria-describedby="password2" placeholder="">
    </div>

    <button type="submit" class="btn btn-primary mt-3">Updaten</button>
  </form>
</div>
@endsection