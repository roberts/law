@extends('layouts.app')

@section('content')
  <section class="section">
    <div style="height:150px;"></div>
    <div class="container">
      <h1 class="title">Contacts</h1>
      <h2 class="subtitle">List of recently added contacts in the RLO Portal</h2>
      <hr>
      <div class="columns">
        <div class="column is-half">
          <nav id="persons" class="panel">
            <p class="panel-heading">Persons</p>
            <div class="panel-block">
              <p class="control has-icons-left">
                <input class="input is-small" type="text" placeholder="search">
                <span class="icon is-small is-left">
                  <i class="fa fa-search"></i>
                </span>
              </p>
            </div>
            <p class="panel-tabs">
              <a href="/contacts/persons" class="is-active">all</a>
              <a href="/contacts/persons/male">male</a>
              <a href="/contacts/persons/female">female</a>
            </p>
            @php
                $firstElement = true;
            @endphp
            @foreach ($persons as $person)
            @if ($person->user_id)
            <a href="{{ $person->path() }}" class="panel-block current is-active">
            @else
            <a href="{{ $person->path() }}" class="panel-block">
            @endif
              <span class="panel-icon">
                @if ($person->type_id == 1)
                <i class="fa fa-male"></i>
                @else
                <i class="fa fa-female"></i>
                @endif
              </span>
              {{ $person->display_name }}
            </a>
            @endforeach
            <a href="/contacts/persons/create" class="panel-block">
              <button class="button is-primary is-outlined is-fullwidth">add new person</button>
            </a>
          </nav>
        </div>
        <div class="column is-half">
          <nav id="organizations" class="panel">
            <p class="panel-heading">Organizations</p>
            <div class="panel-block">
              <p class="control has-icons-left">
                <input class="input is-small" type="text" placeholder="search">
                <span class="icon is-small is-left">
                  <i class="fa fa-search"></i>
                </span>
              </p>
            </div>
            <p class="panel-tabs">
              <a href="/contacts/organizations" class="is-active">all</a>
              <a href="/contacts/organizations/corporation">corp</a>
              <a href="/contacts/organizations/llc">llc</a>
              <a href="/contacts/organizations/firm">firm</a>
              <a href="/contacts/organizations/other">other</a>
            </p>
            @foreach ($organizations as $organization)
                @if ($organization->id == 1 || $organization->partner == 1)
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
      </div>
    </div>
  </section>
  <div style="height:250px;"></div>
@endsection