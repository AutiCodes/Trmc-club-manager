@extends('admin::layouts.master')

@section('title', 'Leden')

@section('content')
<div class="container-fluid">
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
  <hr>
  <div class="container bootstrap">
    <div class="row">
      <div class="col-lg-12">
        <div class="main-box no-header clearfix">
          <div class="main-box-body clearfix">
            <div class="table-responsive">
              <table class="table user-list">
                <thead>
                    <tr>
                    <th><span>Vol. naam</span></th>
                    <th><span>KNVvl</span></th>
                    <th><span>Geboortedatum</span></th>
                    <th><span>Adres</span></th>
                    <th class="text-center"><span>Club status</span></th>
                    <th><span>RDW nmr.</span></th>
                    <th><span>Telefoon</span></th>
                    <th><span>Email</span></th>
                    <th>Open, bewerk, verwijder</th>
                    
                    </tr>
                </thead>
                <tbody>
                  @foreach ($members as $member)
                    <tr>
                      <!-- User -->
                      <td>
                        <a href="#" class="user-link">{{ $member->name }}</a>
                      </td>
                      <!-- KNVvl -->
                      <td>{{ $member->KNVvl }}</td>
                      <!-- Birthday -->
                      <td>{{ $member->birthdate }}</td>
                      <!-- Living address -->
                      <td>{{ $member->address }}</td>
                      <!-- Club status -->
                      @if ($member->club_status == \Modules\Members\Enums\ClubStatus::ASPIRANT_MEMBER->value)
                        <td class="text-center">
                          <span class="badge badge-pill badge-info" style="font-size: 1rem;">Aspirant lid</span>
                        </td>
                      @elseif ($member->club_status == \Modules\Members\Enums\ClubStatus::MEMBER->value)
                        <td class="text-center">
                          <span class="badge badge-pill badge-primary" style="font-size: 1rem;">Lid</span>
                        </td>
                      @elseif ($member->club_status == \Modules\Members\Enums\ClubStatus::MANAGEMENT->value)
                        <td class="text-center">
                          <span class="badge badge-pill badge-warning" style="font-size: 1rem;">Bestuur</span>
                        </td>
                      @endif
                      <!-- RDW number -->
                      <td>{{ $member->rdw_number }}</td>                    
                      <!-- Phone number -->
                      <td>{{ $member->phone }}</td>
                      <!-- Email -->
                      <td>
                        <a href="#">{{ $member->email }}</a>
                      </td>
                      <!-- View, edit, delete buttons -->
                      <td style="width: 20%;">
                        <a href="#" class="table-link text-warning">
                          <span class="fa-stack" style="font-size: 1rem;">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                          </span>
                        </a>
                        <a href="#" class="table-link text-info">
                          <span class="fa-stack" style="font-size: 1rem;">	
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                          </span>
                        </a>
                        <a href="#" class="table-link danger">
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
@endsection
