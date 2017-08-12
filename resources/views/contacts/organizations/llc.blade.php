@extends('layouts.app')

@section('content')
  <section class="section">
    <div style="height:150px;"></div>
    <div class="container">
      <h1 class="title">Organizations</h1>
      <h2 class="subtitle">Here is a list of organizations in the RLO Portal</h2>
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
          <a href="/contacts/organizations">all</a>
          <a href="/contacts/organizations/corporation">corp</a>
          <a href="/contacts/organizations/llc" class="is-active">llc</a>
          <a href="/contacts/organizations/firm">firm</a>
          <a href="/contacts/organizations/other">other</a>
        </p>
        @foreach ($organizations as $organization)
            @if ($organization->counsel == 1)
            <a href="{{ $organization->path() }}" class="panel-block is-active">
            @else
            <a href="{{ $organization->path() }}" class="panel-block">
            @endif
              <span class="panel-icon">
                @if ($organization->type_id == 3)
                <i class="fa fa-balance-scale"></i>
                @else
                <i class="fa fa-building-o"></i>
                @endif
              </span>
              {{ $organization->display_name }}
            </a>
        @endforeach
        <a href="/contacts/organizations/create" class="panel-block">
          <button class="button is-primary is-outlined is-fullwidth">add new organization</button>
        </a>
      </nav>
    </div>
  </section>
  <div style="height:250px;"></div>
@endsection