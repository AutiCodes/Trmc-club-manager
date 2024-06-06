@extends('rcmodels::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('rcmodels.name') !!}</p>
@endsection
