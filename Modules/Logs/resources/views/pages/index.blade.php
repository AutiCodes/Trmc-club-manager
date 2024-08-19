@extends('admin::layouts.master')

@section('content')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  <div class="container mt-4 mb-4 pb-2 pt-2 text-white bg-dark bg-opacity-75 rounded">
    <ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
          Leden
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
          Bestuur
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-logs-tab" data-bs-toggle="pill" data-bs-target="#contact-logs" type="button" role="tab" aria-controls="contact-logs" aria-selected="false">
          Contact
        </button>
      </li>           
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
          Systeem
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="access-logs-tab" data-bs-toggle="pill" data-bs-target="#access-logs" type="button" role="tab" aria-controls="access-logs" aria-selected="false">
          Access
        </button>
      </li>      
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="fail2ban-logs-tab" data-bs-toggle="pill" data-bs-target="#fail2ban-logs" type="button" role="tab" aria-controls="fail2ban-logs" aria-selected="false">
          Fail2Ban
        </button>
      </li>        
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="app_error-logs" data-bs-toggle="pill" data-bs-target="#app_error-logs" type="button" role="tab" aria-controls="app_error-logs" aria-selected="false">
          Applicatie errors
        </button>
      </li>                       
    </ul>

    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">       
        @foreach ($memberActivityLogs as $memberActivityLog)
          @if ($loop->index > 50)
            @break
          @endif 
          @if (str_contains($memberActivityLog, 'INFO') == true)
            <p class="mt-1 mb-1 bg-info text-dark pl-2 pr-2 rounded">{{ $memberActivityLog }}</p>
          @elseif (str_contains($memberActivityLog, 'ERROR') == true)
            <p class="mt-1 mb-1 bg-danger text-dark pl-2 pr-2 rounded">{{ $memberActivityLog }}</p>
          @else 
            <p class="mt-1 mb-1 bg-warning text-dark pl-2 pr-2 rounded">{{ $memberActivityLog }}</p>
          @endif
          <hr>
        @endforeach
      </div>

      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        @foreach ($userActivityLogs as $userActivityLog)
          @if (str_contains($userActivityLog, 'INFO') == true)
            <p class="mt-1 mb-1 bg-info text-dark pl-2 pr-2 rounded">{{ $userActivityLog }}</p>
          @elseif (str_contains($userActivityLog, 'ERROR') == true)
            <p class="mt-1 mb-1 bg-danger text-dark pl-2 pr-2 rounded">{{ $userActivityLog }}</p>
          @else 
            <p class="mt-1 mb-1 bg-warning text-dark pl-2 pr-2 rounded">{{ $userActivityLog }}</p>
          @endif
          <hr>
        @endforeach        
      </div>
      
      <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        @foreach ($laravelLogs as $laravelLog)
          @if ($loop->index > 50)
            @break
          @endif
          @if (str_contains($laravelLog, 'INFO') == true)
            <p class="mt-1 mb-1 bg-info text-dark pl-2 pr-2 rounded">{{ $laravelLog }}</p>
          @elseif (str_contains($laravelLog, 'ERROR') == true)
            <p class="mt-1 mb-1 bg-danger text-dark pl-2 pr-2 rounded">{{ $laravelLog }}</p>
          @else 
            <p class="mt-1 mb-1 bg-warning text-dark pl-2 pr-2 rounded">{{ $laravelLog }}</p>
          @endif
          <hr>
        @endforeach   
      </div>

      <div class="tab-pane fade" id="access-logs" role="tabpanel" aria-labelledby="access-logs-tab">
        @foreach ($accessLogs as $accessLog)
          @if ($loop->index > 50)
            @break
          @endif
          @if (str_contains($accessLog, 'INFO') == true)
            <p class="mt-1 mb-1 bg-info text-dark pl-2 pr-2 rounded">{{ $accessLog }}</p>
          @elseif (str_contains($accessLog, 'ERROR') == true)
            <p class="mt-1 mb-1 bg-danger text-dark pl-2 pr-2 rounded">{{ $accessLog }}</p>
          @else 
            <p class="mt-1 mb-1 bg-warning text-dark pl-2 pr-2 rounded">{{ $accessLog }}</p>
          @endif
          <hr>
        @endforeach           
      </div>      

      <div class="tab-pane fade" id="fail2ban-logs" role="tabpanel" aria-labelledby="fail2ban-logs-tab">
        @foreach ($Fail2Ban as $Fail2Ban)
          @if ($loop->index > 50)
            @break
          @endif
          @if (str_contains($Fail2Ban, 'INFO') == true)
            <p class="mt-1 mb-1 bg-info text-dark pl-2 pr-2 rounded">{{ $Fail2Ban }}</p>
          @elseif (str_contains($Fail2Ban, 'ERROR') == true)
            <p class="mt-1 mb-1 bg-danger text-dark pl-2 pr-2 rounded">{{ $Fail2Ban }}</p>
          @else 
            <p class="mt-1 mb-1 bg-warning text-dark pl-2 pr-2 rounded">{{ $Fail2Ban }}</p>
          @endif
          <hr>
        @endforeach           
      </div>            

      <div class="tab-pane fade" id="app_error-logs" role="tabpanel" aria-labelledby="app_error-logs-tab">
        @foreach ($appErrorLogs as $appErrorLogs)
          @if ($loop->index > 50)
            @break
          @endif
          @if (str_contains($appErrorLogs, 'INFO') == true)
            <p class="mt-1 mb-1 bg-info text-dark pl-2 pr-2 rounded">{{ $appErrorLogs }}</p>
          @elseif (str_contains($appErrorLogs, 'ERROR') == true)
            <p class="mt-1 mb-1 bg-danger text-dark pl-2 pr-2 rounded">{{ $appErrorLogs }}</p>
          @else 
            <p class="mt-1 mb-1 bg-warning text-dark pl-2 pr-2 rounded">{{ $appErrorLogs }}</p>
          @endif
          <hr>
        @endforeach           
      </div>            

      <div class="tab-pane fade" id="contact-logs" role="tabpanel" aria-labelledby="contact-logs-tab">
        @foreach ($memberContact as $contact)
          @if ($loop->index > 50)
            @break
          @endif
          @if (str_contains($contact, 'INFO') == true)
            <p class="mt-1 mb-1 bg-info text-dark pl-2 pr-2 rounded">{{ $contact }}</p>
          @elseif (str_contains($contact, 'ERROR') == true)
            <p class="mt-1 mb-1 bg-danger text-dark pl-2 pr-2 rounded">{{ $contact }}</p>
          @else 
            <p class="mt-1 mb-1 bg-warning text-dark pl-2 pr-2 rounded">{{ $contact }}</p>
          @endif
          <hr>
        @endforeach           
      </div>               

    </div>
  </div>
@endsection
