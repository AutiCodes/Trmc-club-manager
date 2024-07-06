@extends('home::layouts.master')

@section('title', 'TRMC club manager')

@section('content')
  <h1 class="text-center text-white font-weight-bold mt-4 mb-4">In ontwikkeling!</h1>
  <div class="container mt-4">
    <div class="row">	
      <!-- Text -->
      <div class="col-sm text-center text-white">
      <h3>Welkom bij de TRMC club manager!</h3>
      <p>
          Dit is een website voor het aanmelden en het beheren van vluchten op het veld van TRMC. 
          Voor het bestuur is dit ook de plek om leden te beheren, toe te voegen etc!
          Deze website is nog wel vol in ontwikkeling. Het is dus mogelijk dat sommige functionaliteiten nog niet perfect zijn.
      </p>
      <hr>
      <p class="font-weight-bold">
          Hier beneden staat mijn contactinformatie om te mailen met evt problemen of suggesties:
      </p>
      <p>Email: <a href="mailto:webmaster@kelvincodes.nl">webmaster@kelvincodes.nl</a></p>
      </div>
      <!-- Image -->
      <div class="col-sm text-center">
      <img src="/media/images/Under_Construction_-_Webpage_or_Project_Under_Construction.jpg" alt="" class="img-fluid rounded" height="auto">
      </div>
    </div>
  </div>

  <div class="container mt-4">
    <div class="row">
      <div class="col-sm text-white">
        <h3>Laatste site updates:</h3>
        @foreach ($prResults as $pr)
          @if ($loop->index > 10)
            @break
          @endif
          <p>Nr. {{ $pr->number }} - <a href="{{ $pr->html_url }}/files">{{ $pr->title }}</a></p>
        @endforeach
      </div>

      <div class="col-sm text-white">
        <h3>versie:</h3>
        <p>
          <strong>Versie:</strong> {{ $version->tag_name }}<br>
          <strong>Datum:</strong> {{ $version->published_at }}<br>  
        </p>
    </div>
  </div>
@stop