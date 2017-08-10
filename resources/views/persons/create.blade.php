@extends('layouts.app')

@section('content')
  <section class="section">
    <div style="height:150px;"></div>
    <div class="container">
      <h1 class="title">Create New Person</h1>
      <h2 class="subtitle">Add a new contact to the RLO Portal</h2>
      <hr>

        <form method="POST" action="/persons/create">
        {{ csrf_field() }}
			<div class="field is-horizontal">
			  <div class="field-label is-normal">
			    <label class="label">Contact</label>
			  </div>
			  <div class="field-body">
			    <div class="field">
			      <p class="control is-expanded has-icons-left">
			        <input class="input @if ($errors->has('display_name')) is-danger @endif" id="display_name" name="display_name" value="{{ old('display_name') }}" type="text" placeholder="Name">
			        <span class="icon is-small is-left">
			          <i class="fa fa-user"></i>
			        </span>
			        @if ($errors->has('display_name'))
			        	<p class="help is-danger">{{ $errors->first('display_name') }}</p>
					@endif
			      </p>
			    </div>
			    <div class="field">
			      <p class="control is-expanded has-icons-left">
			        <input class="input @if ($errors->has('email')) is-danger @endif" id="email" name="email" value="{{ old('email') }}" type="email" placeholder="Email">
			        <span class="icon is-small is-left">
			          <i class="fa fa-envelope"></i>
			        </span>
			        @if ($errors->has('email'))
			        	<p class="help is-danger">{{ $errors->first('email') }}</p>
					@endif
			      </p>
			    </div>
			  </div>
			</div>

			<div class="field is-horizontal">
			  <div class="field-label is-normal">
			  </div>
			  <div class="field-body">
			    <div class="field">
			      <p class="control is-expanded has-icons-left">
			        <input class="input @if ($errors->has('cell_phone')) is-danger @endif" id="cell_phone" name="cell_phone" value="{{ old('cell_phone') }}" type="tel" placeholder="Cell Phone">
			        <span class="icon is-small is-left">
			          <i class="fa fa-phone"></i>
			        </span>
			        @if ($errors->has('cell_phone'))
			        	<p class="help is-danger">Phone numbers must be formatted as XXX-XXX-XXXX</p>
					@endif
			      </p>
			    </div>
			    <div class="field">
			      <p class="control is-expanded has-icons-left">
			        <input class="input @if ($errors->has('work_phone')) is-danger @endif" id="work_phone" name="work_phone" value="{{ old('work_phone') }}" type="tel" placeholder="Work Phone">
			        <span class="icon is-small is-left">
			          <i class="fa fa-phone"></i>
			        </span>
			        @if ($errors->has('work_phone'))
			        	<p class="help is-danger">Phone numbers must be formatted as XXX-XXX-XXXX</p>
					@endif
			      </p>
			    </div>
			  </div>
			</div>

			<div class="field is-horizontal">
			  <div class="field-label is-normal">
			  </div>
			  <div class="field-body">
			    <div class="field">
			      <p class="control is-expanded has-icons-left">
			        <input class="input @if ($errors->has('address')) is-danger @endif" id="address" name="address" value="{{ old('address') }}" type="text" placeholder="Address">
			        <span class="icon is-small is-left">
			          <i class="fa fa-address-card-o"></i>
			        </span>
			        @if ($errors->has('address'))
			        	<p class="help is-danger">{{ $errors->first('address') }}</p>
					@endif
			      </p>
			    </div>
			  </div>
			</div>

			<div class="field is-horizontal">
			  <div class="field-label is-normal">
			  </div>
			  <div class="field-body">
			    <div class="field">
			      <p class="control is-expanded has-icons-left">
			        <input class="input @if ($errors->has('city')) is-danger @endif" id="city" name="city" value="{{ old('city') }}" type="text" placeholder="City">
			        <span class="icon is-small is-left">
			          <i class="fa fa-map-marker"></i>
			        </span>
			        @if ($errors->has('city'))
			        	<p class="help is-danger">{{ $errors->first('city') }}</p>
					@endif
			      </p>
			    </div>
			    <div class="field is-narrow">
			      <div class="control has-icons-left">
			        <div class="select is-fullwidth">
			          <select id="state" name="state">
						<option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA">California</option>
						<option value="CO">Colorado</option>
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="DC">District Of Columbia</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY" selected>Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI">Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS">Mississippi</option>
						<option value="MO">Missouri</option>
						<option value="MT">Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH">New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA">Virginia</option>
						<option value="WA">Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI">Wisconsin</option>
						<option value="WY">Wyoming</option>
			          </select>
			        </div>
			        <div class="icon is-small is-left">
				      <i class="fa fa-globe"></i>
				    </div>
			      </div>
			    </div>
			    <div class="field is-narrow">
			      <p class="control is-expanded has-icons-left">
			        <input class="input @if ($errors->has('zip')) is-danger @endif" id="zip" name="zip" value="{{ old('zip') }}" type="text" placeholder="ZIP">
			        <span class="icon is-small is-left">
			          <i class="fa fa-home"></i>
			        </span>
			        @if ($errors->has('zip'))
			        	<p class="help is-danger">{{ $errors->first('zip') }}</p>
					@endif
			      </p>
			    </div>
			  </div>
			</div>

			<div class="field is-horizontal">
			  <div class="field-label">
			  </div>
			  <div class="field-body">
			    <div class="field is-narrow">
			      <div class="control">
			        <label class="radio">
			          <input type="radio" id="type_id" name="type_id" value="1" checked>
			          Male
			        </label>
			        <label class="radio">
			          <input type="radio" id="type_id" name="type_id" value="2">
			          Female
			        </label>
			      </div>
			    </div>
			  </div>
			</div>


			<div class="field is-horizontal">
			  <div class="field-label">
			    <!-- Left empty for spacing -->
			  </div>
			  <div class="field-body">
			    <div class="field">
			      <div class="control">
			        <button type="submit" class="button is-primary">Create Person</button>
			      </div>
			    </div>
			  </div>
			</div>
		</form>
    </div>
  </section>
  <div style="height:250px;"></div>
@endsection