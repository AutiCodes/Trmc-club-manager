@extends('admin::layouts.master')	

@section('title', $member->name)

@section('content')	
  <div class="container">
    <form class="col-lg-6 offset-lg-3 pt-4 pb-4" action="{{ route('members.update', $member->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Verwijder {{ $member->name }}</button>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection