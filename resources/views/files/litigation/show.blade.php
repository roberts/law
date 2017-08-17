@extends('layouts.app')

@section('content')
  <section class="section">
    <div style="height:150px;"></div>
    <div class="container">
      	<h1 class="title">{{ $litigation->case_number }}</h1>
    	<h2 class="subtitle">Litigation Details</h2>
      	<hr>
    	<div class="columns">
			<div class="column">

			</div>
			<div class="column is-4-desktop is-5-tablet">
				<form method="POST" action="{{ $litigation->path() }}/notes">
				  	{{ csrf_field() }}
				  	<div class="field">
						<div class="control">
							<textarea class="textarea" id="note" name="note" placeholder="Note Message" required></textarea>
						</div>
					</div>
					<div class="field">
						<div class="control">
							<div class="select">
								<select id="broadcast" name="broadcast">
									<option value="none" selected>Don't Broadcast</option>
									<option value="firm">Broadcast to Firm</option>
									<option value="all">Broadcast to Firm & Co-Counsels</option>
								</select>
							</div>
						</div>
					</div>
					<div class="field is-grouped">
						<div class="control">
							<button type="submit" class="button is-primary">Create Note</button>
						</div>
					</div>
				</form>
				@if (count($litigation->notes) > 0)
				<hr>
				<nav class="panel">
					<p class="panel-heading">notes</p>
					@foreach ($litigation->notes as $note)
						<a class="panel-block" style="align-items:flex-start;">
							<span class="panel-icon" style="padding-top:5px;"><i class="fa fa-comment"></i></span> 
							<div style="width:100%;">{{ $note->note }}
								<div class="has-text-right" style="font-size:0.7rem;">-{{ $note->creator->details->display_name }}</div>
								<div class="has-text-right has-text-grey" style="font-size:0.7rem;">{{$note->created_at->diffForHumans()}}</div>
							</div>
						</a>
					@endforeach
				</nav>
				@endif
			</div>
		</div>
    </div>
  </section>
  <div style="height:250px;"></div>
@endsection