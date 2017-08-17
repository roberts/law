@extends('layouts.app')

@section('content')
  <section class="section">
    <div style="height:150px;"></div>
    <div class="container">
      	<h1 class="title">{{ $file->filetype->title }} Matter for @if (count($file->clients) > 1) {{ $file->clients->first()->display_name }}, et al. @else {{ $file->clients->first()->display_name }} @endif</h1>
      	<h2 class="subtitle">{{ $file->file_number }} File Details</h2>
      	<hr>
    	<div class="columns">
			<div class="column">
				<nav class="panel">
				  <p class="panel-heading">overview</p>
				  <a class="panel-block">
				    <span class="panel-icon"><i class="fa fa-info-circle"></i></span>
				    status: {{ $file->current->status->title }}
				  </a>
				  <a class="panel-block">
				    <span class="panel-icon"><i class="fa fa-address-book-o"></i></span>
				    @if (count($file->clients) > 1) 
				    	clients: {{ $file->clients->first()->display_name }}, et al. 
				    @else 
				    	client: {{ $file->clients->first()->display_name }}
				    @endif
				  </a>
				  <a class="panel-block">
				    <span class="panel-icon"><i class="fa fa-balance-scale"></i></span>
				    counsel: {{ $file->counsel->display_name }}
				  </a>
				  <a class="panel-block">
				    <span class="panel-icon"><i class="fa fa-bullseye"></i></span>
				    @if (count($file->defendants) > 0)
					    @if (count($file->defendants) > 1) 
					    	defendants:  {{ $file->defendants->first()->display_name }}, et al. 
					    @else 
					    	defendant:  {{ $file->defendants->first()->display_name }}
					    @endif
				    @else 
				    	no defendants yet
				    @endif
				  </a>
				  @if ($file->sol)
				  <a class="panel-block">
				    <span class="panel-icon"><i class="fa fa-calendar"></i></span>
				    sol: {{ $file->sol->toFormattedDateString() }}
				  </a>
				  @endif
				  <a class="panel-block">
				    <span class="panel-icon"><i class="fa fa-calendar"></i></span>
				    created: {{ $file->created_at->toFormattedDateString() }}
				  </a>
				  <a class="panel-block">
				    <span class="panel-icon"><i class="fa fa-user"></i></span>
				    created by: {{ $file->creator->details->display_name }}
				  </a>
				</nav>
				<div class="content">
				  <h2>Status</h2>
				  <p>Curabitur accumsan turpis pharetra <strong>augue tincidunt</strong> blandit. Quisque condimentum maximus mi, sit amet commodo arcu rutrum id. Proin pretium urna vel cursus venenatis. Suspendisse potenti. Etiam mattis sem rhoncus lacus dapibus facilisis. Donec at dignissim dui. Ut et neque nisl.</p>
				  <ul>
				    <li>In fermentum leo eu lectus mollis, quis dictum mi aliquet.</li>
				    <li>Morbi eu nulla lobortis, lobortis est in, fringilla felis.</li>
				    <li>Aliquam nec felis in sapien venenatis viverra fermentum nec lectus.</li>
				    <li>Ut non enim metus.</li>
				  </ul>
				</div>
			</div>
			<div class="column is-4-desktop is-5-tablet">
				<form method="POST" action="{{ $file->path() }}/notes">
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
				@if (count($file->notes) > 0)
				<hr>
				<nav class="panel">
					<p class="panel-heading">notes</p>
					@foreach ($file->notes as $note)
						<a class="panel-block" style="align-items:flex-start;">
							<span class="panel-icon" style="padding-top:5px;"><i class="fa fa-comment"></i></span> 
							<div style="width:100%;">{{ $note->note }}
								<div class="has-text-right" style="font-size:0.7rem;">-{{ $note->creator->details->display_name }}</div>
								<div class="has-text-right has-text-grey" style="font-size:0.7rem;">{{ $note->created_at->diffForHumans() }}</div>
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