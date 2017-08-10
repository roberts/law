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
			        <input class="input" id="display_name" name="display_name" type="text" placeholder="Name">
			        <span class="icon is-small is-left">
			          <i class="fa fa-user"></i>
			        </span>
			      </p>
			    </div>
			    <div class="field">
			      <p class="control is-expanded has-icons-left">
			        <input class="input" id="email" name="email" type="email" placeholder="Email">
			        <span class="icon is-small is-left">
			          <i class="fa fa-envelope"></i>
			        </span>
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
			        <input class="input" id="display_name" name="display_name" type="tel" placeholder="Cell Phone">
			        <span class="icon is-small is-left">
			          <i class="fa fa-phone"></i>
			        </span>
			      </p>
			    </div>
			    <div class="field">
			      <p class="control is-expanded has-icons-left">
			        <input class="input" id="email" name="email" type="tel" placeholder="Work Phone">
			        <span class="icon is-small is-left">
			          <i class="fa fa-phone"></i>
			        </span>
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
			        <input class="input" id="address" name="address" type="text" placeholder="Address">
			        <span class="icon is-small is-left">
			          <i class="fa fa-address-card-o"></i>
			        </span>
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
			        <input class="input" id="city" name="city" type="tel" placeholder="City">
			        <span class="icon is-small is-left">
			          <i class="fa fa-map-marker"></i>
			        </span>
			      </p>
			    </div>
			    <div class="field is-narrow">
			      <div class="control has-icons-left">
			        <div class="select is-fullwidth">
			          <select>
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
			        <input class="input" id="zip" name="zip" type="text" placeholder="ZIP">
			        <span class="icon is-small is-left">
			          <i class="fa fa-home"></i>
			        </span>
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
			          <input type="radio" name="member">
			          Male
			        </label>
			        <label class="radio">
			          <input type="radio" name="member">
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