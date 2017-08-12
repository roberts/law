@extends('layouts.app')

@section('content')
  <section class="section">
    <div style="height:150px;"></div>
    <div class="container">
      <h1 class="title">Files</h1>
      <h2 class="subtitle">List of files/matters in RLO Portal</h2>
      <hr>
      <nav id="persons" class="panel">
        <p class="panel-heading">Files</p>
        <div class="panel-block">
          <p class="control has-icons-left">
            <input class="input is-small" type="text" placeholder="search">
            <span class="icon is-small is-left">
              <i class="fa fa-search"></i>
            </span>
          </p>
        </div>
        <p class="panel-tabs">
          <a href="/files" class="{{ set_active('files') }}">all</a>
          <a href="/files/leads" class="{{ set_active('files/leads') }}">leads</a>
          <a href="/files/pre" class="{{ set_active('files/pre') }}">pre-litigation</a>
          <a href="/files/litigation" class="{{ set_active('files/litigation') }}">litigation</a>
          <a href="/files/closed" class="{{ set_active('files/closed') }}">closed</a>
        </p>
        @foreach ($files as $file)
          <a href="{{ $file->path() }}" class="panel-block">
            <div class="column is-half" style="padding:0;">
              <span class="panel-icon" style="vertical-align: 15%;">
                <i class="fa fa-archive"></i>
              </span>{{ $file->file_number }}
            </div>
            <div class="column is-half" style="padding:0;">
              Litigation
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