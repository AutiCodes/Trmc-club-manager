@extends('admin::layouts.master')

@section('content')
  <div class="container mt-4">
    <div class="row">
      <div class="col-sm text-white">
        <h3>Laatste site updates:</h3>
        @foreach ($prResults as $pr)
          @if ($loop->index > 10)
            @break
          @endif
          <p>Nr. {{ $pr->number }} - <a href="{{ $pr->html_url }}/files" target="blank">{{ $pr->title }}</a></p>
        @endforeach
      </div>

      <div class="col-sm text-white">
        <h3>Versie:</h3>
        <p>
          <strong>Versie:</strong> <span class="badge badge-primary">{{ $latestVersion->tag_name }}</span><br>
          <strong>Datum:</strong> {{ $latestVersion->published_at }}<br>  
        </p>
    </div>
  </div>
@endsection
