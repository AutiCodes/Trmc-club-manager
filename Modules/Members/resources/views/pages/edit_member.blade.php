@extends('admin::layouts.master')	

@section('title', $member->name)

@section('content')	
<div class="container-fluid">
  <form class="col-lg-6 offset-lg-3 pt-4 pb-4" action="{{ route('members.update', $member->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
      <div class="col-sm">
        <div class="bg-dark pt-2 pb-2 pl-2 pr-2 mb-2 mt-2 rounded">
          <div class="form-group">
            <label for="name" class="text-white font-weight-bold">Volledige naam</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="fullname" placeholder="Voornaam achternaam" required value="{{ $member->name }}">
            <!-- <small id="fullname" class="form-text text-muted"></small>-->
          </div>

          <div class="form-group">
            <label for="birthdate"  class="text-white font-weight-bold">Geboortedatum</label>
            <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="01-01-2024" required value="{{ $member->birthdate }}">
          </div>
        </div>
      </div>

      <div class="col-sm">
        <div class="bg-dark pt-2 pb-2 pl-2 pr-2 mb-2 mt-2 rounded">
          <div class="form-group">
            <label for="address"  class="text-white font-weight-bold">Adres</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Straatnaam nummer" required value="{{ $member->address }}">
          </div>
          
          <div class="form-group">
            <label for="postcode"  class="text-white font-weight-bold">Postcode</label>
            <input type="text" class="form-control" id="postcode" name="postcode" placeholder="1234AH (zonder spatie!)" required value="{{ $member->postcode }}">
          </div>
          
          <div class="form-group">
            <label for="city"  class="text-white font-weight-bold">Woonplaats</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Woonplaats" required value="{{ $member->city }}">
          </div>
        </div>
      </div>

      <div class="col-sm">
        <div class="bg-dark pt-2 pb-2 pl-2 pr-2 mb-2 mt-2 rounded">
          <div class="form-group">
            <label for="phone"  class="text-white font-weight-bold">Telefoon</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="0612343455 (nummer zonder streepje!)" required value="{{ $member->phone }}">
          </div>
          
          <div class="form-group">
            <label for="email" class="text-white font-weight-bold">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="mail@provider.nl" required value="{{ $member->email }}">
          </div>   
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm">
        <div class="bg-dark pt-2 pb-2 pl-2 pr-2 mb-2 mt-2 rounded">
          <div class="form-group">
            <label for="rdw_number"  class="text-white font-weight-bold">RDW nummer</label>
            <input type="text" class="form-control" id="rdw_number" name="rdw_number" placeholder="A34hjhdwqjkwqa" value="{{ $member->rdw_number }}">>
          </div>    

          <div class="form-group">
            <label for="knvvl"  class="text-white font-weight-bold">KNVvl nummer</label>
            <input type="text" class="form-control" id="knvvl" name="knvvl" placeholder="1234567" value="{{ $member->KNVvl }}">
          </div>   
        </div>
      </div>

      <div class="col-sm">
        <div class="bg-dark pt-2 pb-2 pl-2 pr-2 mb-2 mt-2 rounded">
          <div class="form-group">
            <label for="club_status" class="text-white font-weight-bold">Club status</label>
            <select class="form-control" id="club_status" name="club_status" required>
              @if ($member->club_status == \Modules\Members\Enums\ClubStatus::ASPIRANT_MEMBER->value)
                <option value=1 selected>Aspirant lid</option>
              @else
                <option value=1>Aspirant lid</option>
              @endif
              @if ($member->club_status == \Modules\Members\Enums\ClubStatus::MEMBER->value)
                <option value=2 selected>Lid</option>
              @else
                <option value=2>Lid</option>
              @endif
              @if ($member->club_status == \Modules\Members\Enums\ClubStatus::MANAGEMENT->value)
                <option value=3 selected>Bestuur</option>
              @else
                <option value=3>Bestuur</option>
              @endif          
              @if ($member->club_status == \Modules\Members\Enums\ClubStatus::DONOR->value)
                <option value=5 selected>Donateur</option>
              @else
                <option value=5>Donateur</option>
              @endif
            </select>
          </div> 

          <div class="form-group">
            <label for="instruct" class="text-white font-weight-bold">Instructeur</label>
            <select class="form-control" id="instruct" name="instruct" required>
              @if ($member->instruct == 0)
                <option value=0 selected>Nee</option>
              @else
                <option value=0>Nee</option>
              @endif
              @if ($member->instruct == 1)
                <option value=1 selected>Ja</option>
              @else
                <option value=1>Ja</option>
              @endif
            </select>
          </div> 
        </div>
      </div>

      <div class="col-sm">
        <div class="bg-dark pt-2 pb-2 pl-2 pr-2 mb-2 mt-2 rounded">

          <p class="font-weight-bold text-white mb-0">Brevetten</p>
          <div class="form-check">
            @if ($member->has_plane_brevet == 1)
              <input class="form-check-input" type="checkbox" value=1 id="PlaneCertCheckbox" name="PlaneCertCheckbox" checked>
            @else
              <input class="form-check-input" type="checkbox" value=1 id="PlaneCertCheckbox" name="PlaneCertCheckbox">
            @endif
              <label class="form-check-label text-white" for="PlaneCertCheckbox">
              Motorvliegtuig
            </label>
          </div>

          <div class="form-check">
            @if ($member->has_helicopter_brevet == 1)
              <input class="form-check-input" type="checkbox" value=1 id="HeliCertCheckbox" name="HeliCertCheckbox" checked>
            @else
              <input class="form-check-input" type="checkbox" value=1 id="HeliCertCheckbox" name="HeliCertCheckbox">
            @endif
            <label class="form-check-label text-white" for="HeliCertCheckbox">
              Helicopter
            </label>
          </div>

          <div class="form-check">
            @if ($member->has_glider_brevet == 1)
              <input class="form-check-input" type="checkbox" value=1 id="gliderCertCheckbox" name="gliderCertCheckbox" checked>
            @else
              <input class="form-check-input" type="checkbox" value=1 id="gliderCertCheckbox" name="gliderCertCheckbox">
            @endif
            <label class="form-check-label text-white" for="gliderCertCheckbox">
              Zweefvliegtuig
            </label>
          </div>

          <p class="font-weight-bold text-white mb-0 mt-3">Ter herdenking</p>
          <div class="form-check">
            @if ($member->in_memoriam == 1)
              <input class="form-check-input" type="checkbox" value=1 id="inMemorialCheckbox" name="inMemorialCheckbox" checked>
            @else
              <input class="form-check-input" type="checkbox" value=1 id="inMemorialCheckbox" name="inMemorialCheckbox">
            @endif
            <label class="form-check-label text-white" for="inMemorialCheckbox">
              In memorial
            </label>
          </div>

        </div>
      </div>

    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection