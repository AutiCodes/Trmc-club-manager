@extends('admin::layouts.master')


@section('title', 'Fail2Ban')

@section('content')
  <div class="container bg-dark bg-opacity-75 rounded mt-3 p-3 text-center">
    <h3 class="text-white">Huidige bans:</h3>

    <div class="mt-2 mb-2 ">
      <table class="table text-white">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Gebruikersnaam</th>
            <th scope="col">IP</th>
            <th scope="col">Gebanned tot:</th>
            <th scope="col">Verwijder ban</th>
          </tr>
        </thead>
          @foreach ($bans as $ban)
              <tbody>
                <tr>
                  <th scope="row">{{ $loop->index + 1}} </th>
                  <td>{{ $ban->username }}</td>
                  <td>{{ $ban->ip }}</td>
                  <td>{{ $ban->unban_time }}</td>
                  <td>
                    <a href="fail2ban/delete/{{ $ban->ip }}" onclick="return confirm('Weet je zeker dat je deze ban ongedaan wilt maken?);">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                      </svg>
                    </a>
                  </td>
                </tr>
              </tbody>
          @endforeach
      </table>

      @if (count($bans) <= 0)
        <p class="text-white">Er zijn momenteel geen Fail2Ban bans uitgevoerd!</p>
      @endif
    </div>
    
  </div>
@endsection
