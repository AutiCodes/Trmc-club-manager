@extends('versioning::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('versioning.name') !!}</p>
@endsection
