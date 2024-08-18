@extends('admin::layouts.master')

@section('title', 'Bewerk vlucht')

@section('content')
<div class="container">
  <!-- AJAX -->  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <main>
    <div class="container mt-4 mb-4">
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
      @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
      @endif
      @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
      @endif
      <!-- End error or success reporting -->
      <form class="col-lg-6 offset-lg-3 pt-4 pb-4" id="plane_submittion" action="{{ route('admin.store') }}" method="POST">
        @csrf
        <div class="justify-content-center">
          <!-- TOP TEXT AND IMAGE -->
          <!-- Name -->
          <h4 class="text-white">Bewerk vlucht van {{ $flightSubmittion->member[0]->name }}</h4>

          <!-- DATE -->
          <div class="form-group">
            <label for="date" class="text-white font-weight-bold">Verander de datum:</label>
            <input type="date" value="{{ explode(' ', $flightSubmittion->date_time)[0] }}" id="date" name="date" class="form-control" required>
          </div>

          <!-- TIME -->
          <div class="form-group">
            <label for="time" class="text-white font-weight-bold">Verander detijd:</label>
            <input type="time" value="{{ explode(' ', $flightSubmittion->date_time)[1] }}" id="time" name="time" class="form-control" required >
          </div>

          <p class="text-white mb-0 mt-2">Verander het model type</p>
          <select class="form-select mt-2" aria-label="Model select">
            <option value=1
              @if
              >
            Modelvliegtuig
            </option>
            <option value=2
              >
              Zweefvliegtuig
            </option>
            <option value=3
              >
              Helicopter
            </option>
            <option value=4
              >
              Drone
            </option>

          </select>
        </div>

        <!-- SEND FORM BUTTON -->
        <button type="submit" class="btn btn-success font-weight-bold mt-3" data-toggle="modal" data-target="#exampleModalCenter">Opslaan</button>
      </form>
      </div>

    </main>

    <style>
      body, html {
        background-color: #2f3031;
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

      hr {
        padding-top: 1px;
        padding-bottom: 1px;
        background-color: #ffffff;
        margin-top: 5px;
        margin-bottom: 5px;
      }
    </style>

<script>
  function checkBoxes(e) {
    if (e.checked) {
      document.getElementById(e.id + '_div').style.display = "block";
      document.getElementById('model_type_required').style.visibility = "hidden";
    } else {
      document.getElementById(e.id + '_div').style.display = "none";
      document.getElementById('model_type_required').style.visibility = "visible";
      }
  }

  function nameFunction(e) {
    // Check if name is already stored in local storage
    if(localStorage.getItem('name_id') == null) {
      // Store name in local storage
      localStorage.setItem('name_id', e.value);
    }
  }

  document.addEventListener('DOMContentLoaded', async () => {
    // Do nothing if browser doesn't support local storage
    if(typeof Storage === 'undefined') return;

    // Check if user has a name_id in local storage
    const user = localStorage.getItem('name_id');
    // If not, do nothing
    if(!user) return;

    document.getElementById('name').value = user;
  });
</script>
@stop
