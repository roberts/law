@extends('layouts.app')

@section('content')
  <section class="section">
    <div style="height:150px;"></div>
    <div class="container">
      <h1 class="title">{{ $file->file_number }}</h1>
      <h2 class="subtitle">File Details</h2>
      <hr>
    	<div class="columns">
			<div class="column">
				<div class="box">

				</div>
			</div>
			<div class="column is-narrow-desktop is-narrow-tablet" style="min-width: 300px;">
				<div class="box">

				</div>
				<hr>
			</div>
		</div>
    </div>
  </section>
  <div style="height:250px;"></div>
@endsection