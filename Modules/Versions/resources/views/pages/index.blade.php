@extends('admin::layouts.master')

@section('title', 'Versie management')

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

          <strong>
            Versie:
          </strong>
          <span class="badge badge-primary font-weight-bold">
              <strong>
                {{ env('CURRENT_VERSION') }}
              </strong>
          </span>
          <br>

          <strong>
            Datum:
          </strong> 
          <span class="badge badge-primary">
            <strong>
              {{ $latestVersion->published_at }}
            </strong>
          </span>
          <br>  

          <strong>
            Author:
          </strong> 
          <span class="badge badge-primary">
            <img src="{{ $latestVersion->author->avatar_url }}" style="width: 18px">
              <strong>
                {{ $latestVersion->author->login }}
              </strong>
            </img>
          </span>
          <br>

          <strong>
            Commit branch:
          </strong>
          <span class="badge badge-primary">
            <strong>
              {{ $latestVersion->target_commitish }}
            </strong>
          </span>
          <br>
          @if ($needsUpdate == 1)
            <form action="/update-application" method="get">
              @csrf
              <button type="submit" class="btn btn-primary">Update (Naar versie {{ $latestVersion->tag_name }})</button>
            </form>
          @endif
        </p>
    </div>
  </div>
@endsection
