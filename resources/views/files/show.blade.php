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
				  <a class="panel-block">
				    <span class="panel-icon"><i class="fa fa-balance-scale"></i></span>
				    counsel: {{ $file->counsel->display_name }}
				  </a>
				  @if ($file->sol)
				  <a class="panel-block">
				    <span class="panel-icon"><i class="fa fa-calendar"></i></span>
				    sol: {{ $file->sol->toFormattedDateString() }}
				  </a>
				  @endif
				  <a class="panel-block">
				    <span class="panel-icon"><i class="fa fa-calendar"></i></span>
				    created: {{ $file->created_at->toFormattedDateString() }} by {{ $file->creator->details->display_name }}
				  </a>
				</nav>
				<div class="content">
				  	<h2>Status History</h2>
				  	<p></p>
				  	<ul>
					@foreach ($file->statuses as $status)
						<li>{{ $status->pivot->created_at->toFormattedDateString() }} - {{ App\User::find($status->pivot->created_by)->details->display_name }} changed status to {{ $status->title }}</li>
					@endforeach
						<li><a onclick="show('statusForm')">Update to new Status</a></li>
					</ul>
					<article class="message" id="statusForm" style="display: none;">
						<div class="message-body">
							<form method="POST" action="{{ $file->path() }}/statuses">
							  	{{ csrf_field() }}
								<div class="field">
									<div class="control">
										<div class="select">
											<select id="status_id" name="status_id">
											@foreach ($statusoptions as $option)
												<option value="{{ $option->id }}">{{ $option->title }}</option>
											@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="field is-grouped">
									<div class="control">
										<button type="submit" class="button is-primary">Change Status</button>
									</div>
								</div>
							</form>
						</div>
					</article>
					@if (count($file->clients) > 1)
					<h2>Clients</h2>
					@else
					<h2>Client</h2>
					@endif
					@foreach ($file->clients as $client)
						<p><a href="{{ $client->path() }}">{{ $client->display_name }}</a></p>
						<ul>
							<li>Cell Phone: {{ $client->cell_phone }}</li>
							<li>Home Phone: {{ $client->home_phone }}</li>
							<li>Work Phone: {{ $client->work_phone }}</li>
							<li>Email: {{ $client->email }}</li>
							<li>{{ $client->address }}<br>{{ $client->city }}, {{ $client->state }} {{ $client->zip }}</li>
						</ul>
					@endforeach
					<p><a onclick="show('clientForm')">Add another Client</a></p>
					<article class="message" id="clientForm" style="display: none;">
						<div class="message-body">
							<form method="POST" action="{{ $file->path() }}/clients">
							  	{{ csrf_field() }}
								<div class="field">
									<div class="control">
										<div class="select">
											<select id="status_id" name="status_id">
											@foreach ($statusoptions as $option)
												<option value="{{ $option->id }}">{{ $option->title }}</option>
											@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="field is-grouped">
									<div class="control">
										<button type="submit" class="button is-primary">Add Client</button>
									</div>
								</div>
							</form>
						</div>
					</article>
					@if (count($file->defendants) > 1)
					<h2>Defendants</h2>
					@else
					<h2>Defendant</h2>
					@endif
					@foreach ($file->defendants as $defendant)
						<p><a href="{{ $defendant->path() }}">{{ $defendant->display_name }}</a></p>
						<ul>
							<li>{{ $defendant->address }}<br>{{ $defendant->city }}, {{ $defendant->state }} {{ $defendant->zip }}</li>
						</ul>
					@endforeach
					<p><a onclick="show('defendantForm')">Add Defendant</a></p>
					<article class="message" id="defendantForm" style="display: none;">
						<div class="message-body">
						    <form method="POST" action="{{ $file->path() }}/relations">
							  	{{ csrf_field() }}
								<div class="field">
									<div class="control">
										<div class="select">
											<select id="status_id" name="status_id">
											@foreach ($statusoptions as $option)
												<option value="{{ $option->id }}">{{ $option->title }}</option>
											@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="field is-grouped">
									<div class="control">
										<button type="submit" class="button is-primary">Add Defendant</button>
									</div>
								</div>
							</form>
						</div>
					</article>
					
					<h2>Counsel & Co-Counsels</h2>
					<p><a href="{{ $file->counsel->path() }}">{{ $file->counsel->display_name }}</a></p>
						<ul>
							<li>{{ $file->counsel->address }}<br>{{ $file->counsel->city }}, {{ $file->counsel->state }} {{ $file->counsel->zip }}</li>
						</ul>
					@foreach ($file->cocounsels as $cocounsel)
						<p><a href="{{ $cocounsel->path() }}">{{ $cocounsel->display_name }}</a></p>
						<ul>
							<li>{{ $cocounsel->address }}<br>{{ $cocounsel->city }}, {{ $cocounsel->state }} {{ $cocounsel->zip }}</li>
						</ul>
					@endforeach
					<p><a onclick="show('cocounselForm')">Add Co-Counsel</a></p>
					<article class="message" id="cocounselForm" style="display: none;">
						<div class="message-body">
							<form method="POST" action="{{ $file->path() }}/relations">
							  	{{ csrf_field() }}
								<div class="field">
									<div class="control">
										<div class="select">
											<select id="status_id" name="status_id">
											@foreach ($statusoptions as $option)
												<option value="{{ $option->id }}">{{ $option->title }}</option>
											@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="field is-grouped">
									<div class="control">
										<button type="submit" class="button is-primary">Add Co-Counsel</button>
									</div>
								</div>
							</form>
						</div>
					</article>
					<h2>Statute of Limitations</h2>
					<p></p>
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

@section('javascript')
	<script type="text/javascript">
	    function show(target){
			document.getElementById(target).style.display = 'block';
		}
    </script>
@endsection