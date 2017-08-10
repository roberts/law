@extends('layouts.app')

@section('content')
  <section class="section">
    <div style="height:150px;"></div>
    <div class="container">
      <h1 class="title">Persons</h1>
      <h2 class="subtitle">Here is a list of the organiztions in the RLO Portal</h2>
      <hr>
      <nav id="persons" class="panel">
        <p class="panel-heading">Person Contacts</p>
        <div class="panel-block">
          <p class="control has-icons-left">
            <input class="input is-small" type="text" placeholder="search">
            <span class="icon is-small is-left">
              <i class="fa fa-search"></i>
            </span>
          </p>
        </div>
        <p class="panel-tabs">
          <a href="/persons">all</a>
          <a href="/persons/male">male</a>
          <a href="/persons/female" class="is-active">female</a>
        </p>
        @php
            $firstElement = true;
        @endphp
        @foreach ($persons as $person)
        @if ($firstElement)
            @php
                $firstElement=false;
            @endphp
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
        <a href="/persons/create" class="panel-block">
          <button class="button is-primary is-outlined is-fullwidth">add new person</button>
        </a>
      </nav>
    </div>
  </section>
  <div style="height:250px;"></div>
@endsection