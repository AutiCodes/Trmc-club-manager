@extends('admin::layouts.master')

@section('title', 'Vlucht rapportages')

@section('content')
  <div class="container">
    <div class="row mt-4">
      <!-- Manual make new report from specific dates -->
      <div class="col bg-dark bg-opacity-75 rounded p-2 m-2">
        <h6 class="text-white">Maak rapportage</h6>
        <form action="{{ route('flight-reports.store') }}" method="POST">
          @csrf
          <div class="card-transparant">
            <div class="card-body">
              <label for="startDate" class="text-white">Start datum</label>
              <input id="startDate" name="startDate" class="form-control" type="date" />

              <label for="endDate" class="text-white">Eind datum</label>
              <input id="endDate" name="endDate" class="form-control" type="date" />

              <button type="submit" class="btn btn-success mt-2">Genereer</button>
            </div>
          </div>
        </form>
      </div>

      <!-- Show manual generated flight-reports -->
      <div class="col bg-dark bg-opacity-75 rounded p-2 m-2">
        <h6 class="text-white">Handmatige rapportages</h6>
        <div class="overflow-auto" style="max-height: 180px">
          @foreach ($manualFlightReports as $manualFlightReport)
            @if (str_contains($manualFlightReport, 'pdf'))
              <a href="pdf/flight_reports_manual/{{ $manualFlightReport }}">{{ $manualFlightReport }}</a><br>
            @endif
          @endforeach
        </div>
      </div>

      <!-- Show automatic generated flight-reports -->
      <div class="col  bg-dark bg-opacity-75 rounded p-2 m-2">
        <h6 class="text-white">Automatische rapportages</h6>
        <div class="overflow-auto" style="max-height: 180px">
          @foreach ($automaticFlightReports as $automaticFlightReport)
            @if (str_contains($automaticFlightReport, 'pdf'))
              <a href="pdf/flight_reports/{{ $automaticFlightReport }}">{{ $automaticFlightReport }}</a><br>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
@stop
