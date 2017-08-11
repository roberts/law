@extends('layouts.app')

@section('content')
  <section class="section">
    <div style="height:150px;"></div>
    <div class="container">
      <h1 class="title">Organizations</h1>
      <h2 class="subtitle">Here is a list of the organiztions in the RLO Portal</h2>
      <hr>
      <nav id="organizations" class="panel">
        <p class="panel-heading">Organization Contacts</p>
        <div class="panel-block">
          <p class="control has-icons-left">
            <input class="input is-small" type="text" placeholder="search">
            <span class="icon is-small is-left">
              <i class="fa fa-search"></i>
            </span>
          </p>
        </div>
        <p class="panel-tabs">
          <a class="is-active">all</a>
          <a>corporations</a>
          <a>sole proprietor</a>
          <a>partnership</a>
          <a>LLC</a>
          <a>not-for-profit</a>
          <a>government agency</a>
        </p>
        @foreach ($organizations as $organization)
        <a href="{{ $organization->path() }}" class="panel-block">
          <span class="panel-icon">
            <i class="fa fa-building-o"></i>
          </span>
          {{ $organization->display_name }}
        </a>
        @endforeach
        <a href="/organizations" class="panel-block">
          <button class="button is-primary is-outlined is-fullwidth">reset all filters</button>
        </a>
      </nav>
    </div>
  </section>
  <div style="height:250px;"></div>
@endsection