@extends('models::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('models.name') !!}</p>
@endsection
