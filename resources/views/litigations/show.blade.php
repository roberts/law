@extends('layouts.app')

@section('content')
  <section class="section">
    <div style="height:150px;"></div>
    <div class="container">
      <h1 class="title">{{ $litigation->case_number }}</h1>
      <h2 class="subtitle">Litigation Details</h2>
      <hr>
      
    </div>
  </section>
  <div style="height:250px;"></div>
@endsection