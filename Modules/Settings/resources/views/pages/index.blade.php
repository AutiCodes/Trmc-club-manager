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
                <button class="nav-link" id="nav-security-tab" data-bs-toggle="tab" data-bs-target="#nav-security" type="button" role="tab" aria-controls="nav-security" aria-selected="true">
                  Security
                </button>    
                <button class="nav-link" id="nav-automations-tab" data-bs-toggle="tab" data-bs-target="#nav-automations" type="button" role="tab" aria-controls="nav-automations" aria-selected="true">
                  Automatiseringen
                </button>                            
                <button class="nav-link" id="nav-other-tab" data-bs-toggle="tab" data-bs-target="#nav-other" type="button" role="tab" aria-controls="nav-other" aria-selected="true">
                  Testing
                </button>                
              </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
              <!-- General -->
              <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
                <div class="row m-2 p-2">
                  <div class="col">
                    
                  </div>
                </div>
              </div>

              <!-- Security -->
              <div class="tab-pane fade" id="nav-security" role="tabpanel" aria-labelledby="nav-security-tab">
                <div class="row m-2 p-2">
                  <div class="col">
                    <!-- Fail2Ban  -->
                    <div class="card">
                      <div class="card-header">
                        Zet de Fail2Ban beveiliging uit/aan
                      </div>
                      <div class="card-body">
                        <div class="form-check form-switch">
                          <input class="form-check-input" value=1 type="checkbox" id="fail2ban" name="fail2ban"
                          @if (Modules\Settings\Models\Setting::getValue('fail2ban') == 1)
                            checked
                          @endif
                          >
                          <label class="form-check-label" for="fail2ban">Uit/Aan</label>
                        </div>
                      </div>
                    </div>
                    <!-- End Fail2Ban -->
                  </div>
                </div>
              </div>

              <!-- Automations -->
              <div class="tab-pane fade" id="nav-automations" role="tabpanel" aria-labelledby="nav-automations-tab">
                <div class="row m-2 p-2">
                  <div class="col">
                    <!-- Automatic send monthly reports -->
                    <div class="card">
                      <div class="card-header">
                        Verstuur een maandelijkse vlucht report per mail
                      </div>

                      <div class="card-body">
                        <div class="form-check form-switch">
                          <input class="form-check-input" value=1 type="checkbox" id="automatic_flight_report" name="automatic_flight_report"
                            @if (Modules\Settings\Models\Setting::getValue('automatic_flight_report') == 1)
                              checked
                            @endif
                          >
                          <label class="form-check-label" for="automatic_flight_report">Uit/Aan</label>
                        </div>

                        <div class="form-group">
                          <label for="automatic_flight_report_date" class="text-white font-weight-bold">Selecteer een datum:</label>
                          <input type="date" id="automatic_flight_report_date" name="automatic_flight_report_date" class="form-control w-sm-50"
                            @if (Modules\Settings\Models\Setting::getValue('automatic_flight_report_date') != 0)
                              value="{{ Modules\Settings\Models\Setting::getValue('automatic_flight_report_date') }}"
                            @endif
                          >
                        </div>

                        <div class="mb-3">
                          <label for="automatic_flight_report_email" class="form-label">Email adres</label>
                          <input type="email" class="form-control" id="automatic_flight_report_email" name="automatic_flight_report_email" aria-describedby="auto_flight_report_on_mail_email"
                            @if (Modules\Settings\Models\Setting::getValue('automatic_flight_report_email') != 0)
                              value="{{ Modules\Settings\Models\Setting::getValue('automatic_flight_report_email') }}"                              
                            @endif
                          >
                        </div>
                      </div>
                    </div>
                    <!-- End  -->
                  </div>
                </div>
              </div>              

              <!-- Testing -->
              <div class="tab-pane fade " id="nav-other" role="tabpanel" aria-labelledby="nav-other-tab">
                <div class="row">
                  <div class="col m-2">
                    <!-- Test setting -->
                    <div class="card">
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
            <button type="submit" class="btn btn-primary mt-3 m-2">Opslaan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@stop