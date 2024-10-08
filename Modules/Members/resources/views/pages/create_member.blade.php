@extends('admin::layouts.master')	

@section('title', 'Leden/bestuur toevoegen')

@section('content')	
<div class="container-fluid">
  <form class="col-lg-6 offset-lg-3 pt-4 pb-4" action="{{ route('members.store') }}" method="POST">
    @csrf

    <div class="row bg-dark rounded bg-opacity-75">
      <div class="col-sm">
        <div class="pt-2 pb-2 pl-2 pr-2 mb-2 mt-2">
          <div class="form-group">
            <label for="name" class="text-white font-weight-bold">Volledige naam</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="fullname" placeholder="Voornaam achternaam" value="{{ old('name') }}" required>
            <!-- <small id="fullname" class="form-text text-muted"></small>-->
          </div>

          <div class="form-group">
            <label for="birthdate"  class="text-white font-weight-bold">Geboortedatum</label>
            <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="01-01-2024" value="{{ old('birthdate') }}" required>
          </div>
        </div>        
      </div>

      <div class="col-sm">
        <div class="pt-2 pb-2 pl-2 pr-2 mb-2 mt-2">
          <div class="form-group">
            <label for="address"  class="text-white font-weight-bold">Adres</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Straatnaam nummer" value="{{ old('address') }}" required>
          </div>
          
          <div class="form-group">
            <label for="postcode"  class="text-white font-weight-bold">Postcode</label>
            <input type="text" class="form-control" id="postcode" name="postcode" placeholder="1234AH (zonder spatie!)" value="{{ old('postcode') }}" required>
          </div>
          
          <div class="form-group">
            <label for="city"  class="text-white font-weight-bold">Woonplaats</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Woonplaats" value="{{ old('city') }}" required>
          </div>
        </div>
      </div>

      <div class="col-sm">
        <div class="pt-2 pb-2 pl-2 pr-2 mb-2 mt-2">
          <div class="form-group">
            <label for="phone"  class="text-white font-weight-bold">Telefoon</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="0612343455 (nummer zonder streepje!)" value="{{ old('phone') }}" required>
          </div>
          
          <div class="form-group">
            <label for="email" class="text-white font-weight-bold">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="mail@provider.nl" value="{{ old('email') }}" required>
          </div>   
        </div>
      </div>
    </div>

    <div class="row bg-dark rounded bg-opacity-75 mt-2">
      <div class="col-sm">
        <div class="pt-2 pb-2 pl-2 pr-2 mb-2 mt-2">
          <div class="form-group">
            <label for="rdw_number"  class="text-white font-weight-bold">RDW nummer</label>
            <input type="text" class="form-control" id="rdw_number" name="rdw_number" placeholder="A34hjhdwqjkwqa" value="{{ old('rdw_number') }}">
          </div>    

          <div class="form-group">
            <label for="knvvl"  class="text-white font-weight-bold">KNVvl nummer</label>
            <input type="text" class="form-control" id="knvvl" name="knvvl" placeholder="1234567" value="{{ old('name') }}">
          </div>   
        </div>
      </div>

      <div class="col-sm">
        <div class="pt-2 pb-2 pl-2 pr-2 mb-2 mt-2">
          <div class="form-group">
            <label for="club_status" class="text-white font-weight-bold">Club status</label>
            <select class="form-control" id="club_status" name="club_status" required>
              <option selected disabled>selecteer...</option>
              <!-- TODO: add ENUM -->
              <option value=6>Jeugd lid</option>
              <option value=1>Aspirant lid</option>
              <option value=2>Lid</option>
              <option value=3>Bestuur</option>
              <option value=5>Donateur</option>
              <option value=7>Nog geen lid</option>
            </select>
          </div> 

          <div class="form-group">
            <label for="instruct" class="text-white font-weight-bold">Instructeur</label>
            <select class="form-control" id="instruct" name="instruct" required>
              <option value=0 selected>Nee</option>
              <option value=1>Ja</option>
            </select>
          </div> 
        </div>
      </div>
      
      <div class="col-sm">
        <div class="pt-2 pb-2 pl-2 pr-2 mb-2 mt-2">
          <h4 class="font-weight-bold text-white mb-0">Brevetten</h4>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value=1 id="PlaneCertCheckbox" name="PlaneCertCheckbox">
            <label class="form-check-label text-white" for="PlaneCertCheckbox">
              Motorvliegtuig
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" value=1 id="HeliCertCheckbox" name="HeliCertCheckbox">
            <label class="form-check-label text-white" for="HeliCertCheckbox">
              Helicopter
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" value=1 id="gliderCertCheckbox" name="gliderCertCheckbox">
            <label class="form-check-label text-white" for="gliderCertCheckbox">
              Zweefvliegtuig
            </label>
          </div>

          <h4 class="font-weight-bold text-white mb-0 mt-2">Speciale status</h4>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value=1 id="honoraryMemberCheckbox" name="honoraryMemberCheckbox"> 
            <label class="form-check-label text-white" for="honoraryMemberCheckbox">
              Erelid
            </label>
          </div>

        </div>
      </div>
    </div>

    <div class="row bg-dark rounded bg-opacity-75 mt-2">
      <div class="col-sm">
        <div class="pt-2 pb-2 ps-2 pe-2 mb-2 mt-2 w-25">
          <h4 class="font-weight-bold text-white mb-0">Drone certificaten</h4>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value=1 id="droneA1Checkbox" name="droneA1Checkbox">
            <label class="form-check-label text-white" for="droneA1Checkbox">
              A1
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" value=1 id="droneA2Checkbox" name="droneA2Checkbox">
            <label class="form-check-label text-white" for="droneA2Checkbox">
              A2
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" value=1 id="droneA3Checkbox" name="droneA3Checkbox">
            <label class="form-check-label text-white" for="droneA3Checkbox">
              A3
            </label>
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-success mt-">Lid toevoegen</button>

    </div>

  </form>
</div>
@endsection