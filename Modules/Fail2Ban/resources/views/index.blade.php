@extends('fail2ban::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('fail2ban.name') !!}</p>
@endsection
