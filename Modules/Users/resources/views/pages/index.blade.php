@extends('admin::layouts.master')

@section('title', 'Bestuursleden overzicht')

@section('content')
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

  <div class="container bg-dark bg-opacity-75 mt-2 rounded">

    <h3 class="text-white mt-3 mb-3">Bestuursleden</h3>

    <div class="table-responsive">
      <table class="table align-middle  text-white">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Naam</th>
            <th scope="col">Email</th>
            <th scope="col">Gebruikersnaam</th>
            <th scope="col">Bewerk, verwijder</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->username }}</td>
              <td>
                <a href="{{ route('users.edit', $user->id) }}" class="table-link text-info">
                  <span class="fa-stack" style="font-size: 1rem;">	
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
                <a href="bestuursleden/verwijder/{{ $user->id }}" class="table-link danger" onclick="return confirm('Weet je zeker dat je gebruiker {{ $user->name }} wilt verwijderen?');">
                  <span class="fa-stack" style="font-size: 1rem;">
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <style>
    body{
        background:#eee;    
    }
    .main-box.no-header {
        padding-top: 20px;
    }
    .main-box {
        background: #FFFFFF;
        -webkit-box-shadow: 1px 1px 2px 0 #CCCCCC;
        -moz-box-shadow: 1px 1px 2px 0 #CCCCCC;
        -o-box-shadow: 1px 1px 2px 0 #CCCCCC;
        -ms-box-shadow: 1px 1px 2px 0 #CCCCCC;
        box-shadow: 1px 1px 2px 0 #CCCCCC;
        margin-bottom: 16px;
        -webikt-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
    .table a.table-link.danger {
        color: #e74c3c;
    }
    .label {
        border-radius: 3px;
        font-size: 0.875em;
        font-weight: 600;
    }
    .user-list tbody td .user-subhead {
        font-size: 0.875em;
        font-style: italic;
    }
    .user-list tbody td .user-link {
        display: block;
        font-size: 1.25em;
        padding-top: 3px;
        margin-left: 0px;
    }
    a {
        color: #3498db;
        outline: none!important;
    }
    .user-list tbody td>img {
        position: relative;
        max-width: 50px;
        float: left;
        margin-right: 15px;
    }

    .table thead tr th {
        text-transform: uppercase;
        font-size: 0.875em;
    }
    .table thead tr th {
        border-bottom: 2px solid #e7ebee;
    }
    .table tbody tr td:first-child {
        font-size: 1.125em;
        font-weight: 300;
    }
    .table tbody tr td {
        font-size: 0.875em;
        vertical-align: middle;
        border-top: 1px solid #e7ebee;
        padding: 12px 8px;
    }
    a:hover{
    text-decoration:none;
    }
  </style>

  <script>
    function nameFilter() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("name_search");
      filter = input.value.toUpperCase();
      table = document.getElementById("MembersTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }

    function clubStatusFilter() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("clubstatus_filter");
      table = document.getElementById("MembersTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[4];

        if (td) {
          txtValue = td.textContent || td.innerText;
          console.log(input.value.replace(/\s/g,''), txtValue.replace(/\s/g,''))

          if (input.value.replace(/\s/g,'') === txtValue.replace(/\s/g,'')) {
            tr[i].style.display = "";
          } else if (input.value.replace(/\s/g,'') === 'All') {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>
@endsection
