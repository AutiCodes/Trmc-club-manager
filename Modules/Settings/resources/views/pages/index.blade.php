@extends('admin::layouts.master')	

@section('title', 'Instellingen')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <div class="bg-dark bg-opacity-75 pt-2 pb-2 pl-2 pr-2 mb-2 mt-2 rounded ">
          <form class="" action="{{ route('settings.store') }}" method="POST">
            <!-- Settings nav -->
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-general-tab" data-bs-toggle="tab" data-bs-target="#nav-general" type="button" role="tab" aria-controls="nav-general" aria-selected="true">
                  Algemeen
                </button>
                <button class="nav-link" id="nav-other-tab" data-bs-toggle="tab" data-bs-target="#nav-other" type="button" role="tab" aria-controls="nav-other" aria-selected="true">
                  Testing
                </button>                
              </div>
            </nav>

            <!-- The settings -->
            <div class="tab-content" id="nav-tabContent">
              <!-- General settings -->
              <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
                <div class="row m-2 p-2">
                  <div class="col">
                    
                  </div>
                </div>
              </div>

              <div class="tab-pane fade " id="nav-other" role="tabpanel" aria-labelledby="nav-other-tab">
                <div class="row">
                  <div class="col mt-2">
                      <!-- Test setting -->
                    <div class="card w-25">
                      <div class="card-header">
                        Test setting
                      </div>
                      <div class="card-body">
                        <div class="form-check form-switch">
                          <input class="form-check-input" value=1 type="checkbox" id="test_setting" name="test_setting"
                          @if (Modules\Settings\Models\Setting::getValue('test_setting') == 1)
                            checked
                          @endif
                          >
                          <label class="form-check-label" for="test_setting">Uit/Aan</label>
                        </div>
                      </div>
                    </div>
                    <!-- End test setting -->
                  </div>
                </div>
              </div>              
            </div>

            @csrf
            <button type="submit" class="btn btn-primary mt-3">Opslaan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@stop