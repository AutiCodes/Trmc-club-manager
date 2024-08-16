@extends('admin::layouts.master')

@section('title', 'Bestuurdleden overzicht')

@section('content')
  <div class="container-fluid">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"> <!-- TODO: fix internal import -->
    <hr>
    <div class="container bootstrap">
      <div class="row">
        <div class="col-lg-12">
          <div class="main-box no-header clearfix">
            <div class="w-25 float-left mb-4 ml-4">
              <input type="text" id="name_search" onkeyup="nameFilter()" placeholder="Zoek naam" class="form-control rounded">
            </div>

            <div class="w25 float-right mb-4 mr-4">
              <select class="form-control form-control-lg" id="clubstatus_filter" onchange="clubStatusFilter()">
                <option value="All" selected>Alle club statussen</option>
                <option value="Aspirantlid">Aspirant lid</option>
                <option value="Lid">Lid</option>
                <option value="Bestuur">Bestuur</option>
                <option value="Donateur">Donateur</option>
              </select>
            </div>
            
            <div class="main-box-body clearfix">
              <div class="table-responsive">
                <table class="table user-list" id="MembersTable">
                  <thead>
                    <tr>
                      <th><span>Vol. naam</span></th>
                      <th><span>Gebruikersnaam</span></th>
                      <th>Open, bewerk, verwijder</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <!-- User -->
                        <td>
                          <a href="#" class="user-link">{{ $user->name }}</a>
                        </td>
                        <!-- Username -->
                        <td>
                          <a href="#">{{ $user->username }}</a>
                        </td>
                        <!-- Email -->
                        <!-- View, edit, delete buttons -->
                        <td style="width: 20%;">
                          <a href="#" class="table-link text-warning">
                            <span class="fa-stack" style="font-size: 1rem;">
                              <i class="fa fa-square fa-stack-2x"></i>
                              <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                            </span>
                          </a>
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
                </table
              </div>
            </div>
          </div>
        </div>
      </div>
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
