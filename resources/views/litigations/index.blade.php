@extends('layouts.app')

@section('content')
  <section class="section">
    <div style="height:150px;"></div>
    <div class="container">
      <h1 class="title">Litigation</h1>
      <h2 class="subtitle">List of cases/litigations in RLO Portal</h2>
      <hr>
      <nav id="persons" class="panel">
        <p class="panel-heading">Litigations</p>
        <div class="panel-block">
          <p class="control has-icons-left">
            <input class="input is-small" type="text" placeholder="search">
            <span class="icon is-small is-left">
              <i class="fa fa-search"></i>
            </span>
          </p>
        </div>
        <p class="panel-tabs">
          <a href="/files" class="{{ set_active('litigations') }}">all</a>
          <a href="/files/litigation" class="{{ set_active('files/litigation') }}">litigation</a>
        </p>
        @foreach ($litigations as $litigation)
          <a href="{{ $litigation->path() }}" class="panel-block">
            <div class="column is-one-third" style="padding:0;">
              <span class="panel-icon" style="vertical-align: 15%;">
                <i class="fa fa-archive"></i>
              </span>{{ $litigation->case_number }}
            </div>
            <div class="column is-one-third has-text-centered" style="padding:0;">
              
            </div>
            <div class="column is-one-third has-text-right" style="padding:0;">
                
            </div>
          </a>
        @endforeach
        <a href="/files/create" class="panel-block">
          <button class="button is-primary is-outlined is-fullwidth">add new file</button>
        </a>
      </nav>
    </div>
  </section>
  <div style="height:250px;"></div>
@endsection