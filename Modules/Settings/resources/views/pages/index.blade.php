@extends('admin::layouts.master')	

@section('title', 'Instellingen')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <div class="bg-dark bg-opacity-75 pt-2 pb-2 pl-2 pr-2 mb-2 mt-2 rounded ">
          <!-- Settings tabs -->
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                Algemeen
              </a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                Uiterlijk
              </a>
              <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                Systeem
              </a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <p class="text-white">
                ...
              </p>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <p class="text-white">
                ...
              </p>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
              <form action="{{ route('settings.store') }}" method="POST">
                @csrf
                <div class="form-check form-switch m-2">
                  <input class="form-check-input" type="checkbox" role="switch" value=1 id="debugModeSwitch" name="debug">
                  <label class="form-check-label text-white" for="debugModeSwitch">Debug mode</label>
                </div>

                <button type="submit" class="btn btn-success">Opslaan</button>
              </form>
            </div>
          </div>
        </div>

      </div> 
    </div>
  </div>

  <script>
    $('#myTab a').on('click', function (e) {
      e.preventDefault()
      $(this).tab('show')
    });
  </script>
@stop