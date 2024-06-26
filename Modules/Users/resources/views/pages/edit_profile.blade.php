@extends('admin::layouts.master')	

@section('title', $user->name)

@section('content')	
<div class="container">
  <form class="col-lg-6 offset-lg-3 pt-4 pb-4" action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="name" class="text-white font-weight-bold">Volledige naam</label>
      <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Voornaam achternaam" required value="{{ $user->name }}">
      <!-- <small id="fullname" class="form-text text-muted"></small>-->
    </div>

    <div class="form-group">
      <label for="username" class="text-white font-weight-bold">Gebruikersnaam</label>
      <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Gebruikersnaam" required value="{{ $user->username }}">
      <!-- <small id="fullname" class="form-text text-muted"></small>-->
    </div>

    <div class="form-group">
      <label for="password" class="text-white font-weight-bold">Nieuw wachtwoord</label>
      <input type="password" class="form-control" id="password" name="password" aria-describedby="password" placeholder="">
      <!-- <small id="fullname" class="form-text text-muted"></small>-->
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection