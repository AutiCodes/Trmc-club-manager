@extends('admin::layouts.master')	

@section('title', $user->name)

@section('content')	
<div class="container">
  <form class="col-lg-6 offset-lg-3 pt-4 pb-4" action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="password" class="text-white font-weight-bold">Nieuw wachtwoord</label>
      <input type="password" class="form-control" id="password" name="password" aria-describedby="password" placeholder="">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection