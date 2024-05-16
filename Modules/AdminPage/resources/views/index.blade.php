@extends('adminpage::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('adminpage.name') !!}</p>
@endsection
