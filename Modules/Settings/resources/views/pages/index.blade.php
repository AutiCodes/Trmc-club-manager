@extends('admin::layouts.master')	

@section('title', 'Instellingen')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm p-2">
        <div class="bg-dark bg-opacity-75 p-2 mb-2 mt-2 rounded ">
          <form action="{{ route('settings.update', 'debug') }}">
            @method('PUT')
            @csrf
            <div class="form-check form-switch ml-2">
              <input class="form-check-input" value=1 type="checkbox" id="debugCheckBox" name="debug">
              <label class="form-check-label text-white font-weight-bold" for="debugCheckBox">Debug mode</label>
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-2">Opslaan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@stop