@extends('versions::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('versions.name') !!}</p>
@endsection
