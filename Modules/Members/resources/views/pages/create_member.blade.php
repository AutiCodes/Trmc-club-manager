@extends('admin::layouts.master')	

@section('title', 'Leden/bestuur toevoegen')

@section('content')	
<div class="container">
  <!-- Error or success reporting -->
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


  <form class="col-lg-6 offset-lg-3 pt-4 pb-4" action="{{ route('members.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="fullname" class="text-white font-weight-bold">Volledige naam</label>
      <input type="text" class="form-control" id="fullname" name="fullname" aria-describedby="fullname" placeholder="Voornaam achternaam" required>
      <!-- <small id="fullname" class="form-text text-muted"></small>-->
    </div>

    <div class="form-group">
      <label for="birthdate"  class="text-white font-weight-bold">Geboortedatum</label>
      <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="01-01-2024" required>
    </div>

    <div class="form-group">
      <label for="birthdate"  class="text-white font-weight-bold">Adres</label>
      <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="Straatnaam nummer" required>
    </div>
    
    <div class="form-group">
      <label for="birthdate"  class="text-white font-weight-bold">Postcode</label>
      <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="1234AH (zonder spatie!)" required>
    </div>
    
    <div class="form-group">
      <label for="birthdate"  class="text-white font-weight-bold">Woonplaats</label>
      <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="Woonplaats" required>
    </div>
    
    <div class="form-group">
      <label for="birthdate"  class="text-white font-weight-bold">Telefoon</label>
      <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="0612343455 (nummer zonder streepje!)" required>
    </div>
    
    <div class="form-group">
      <label for="birthdate"  class="text-white font-weight-bold">RDW nummer</label>
      <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="A34hjhdwqjkwqa" required>
    </div>    

    <div class="form-group">
      <label for="birthdate"  class="text-white font-weight-bold">KNVvl nummer</label>
      <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="1234567" required>
    </div>   
    
    <div class="form-group">
      <label for="birthdate"  class="text-white font-weight-bold">E-mail</label>
      <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="mail@provider.nl" required>
    </div>   

    <div class="form-group">
      <label for="club_status" class="text-white font-weight-bold">Club status</label>
      <select class="form-control" id="club_status" name="club_status" required>
        <option selected disabled>selecteer...</option>
        <option>Aspirant lid</option>
        <option>Lid</option>
        <option>Bestuur</option>
      </select>
    </div> 

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection