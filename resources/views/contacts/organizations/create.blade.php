@extends('layouts.app')

@section('content')
  <section class="section">
    <div style="height:150px;"></div>
    <div class="container">
      <h1 class="title">Create New Organization</h1>
      <h2 class="subtitle">Add a new organization to the RLO Portal</h2>
      <hr>

        <form method="POST" action="/contacts/organizations/create">
        {{ csrf_field() }}
			<div class="field is-horizontal">
			  <div class="field-label is-normal">
			    <label class="label">Required Fields</label>
			  </div>
			  <div class="field-body">
			    <div class="field">
			      <p class="control is-expanded has-icons-left">
			        <input class="input @if ($errors->has('display_name')) is-danger @endif" id="display_name" name="display_name" value="{{ old('display_name') }}" type="text" placeholder="Organization Display Name">
			        <span class="icon is-small is-left">
			          <i class="fa fa-building-o"></i>
			        </span>
			        @if ($errors->has('display_name'))
			        	<p class="help is-danger">{{ $errors->first('display_name') }}</p>
					@endif
			      </p>
			    </div>
			    <div class="field is-narrow">
			      <div class="control has-icons-left">
			        <div class="select is-fullwidth">
			          <select id="type_id" name="type_id">
						<option value="4">Corporation</option>
						<option value="5">LLC</option>
						<option value="3">Law Firm</option>
						<option value="6">Sole Proprietor</option>
						<option value="7">Partnership</option>
						<option value="8">Not-for-Profit</option>
						<option value="9">Government Agency</option>
			          </select>
			        </div>
			        <div class="icon is-small is-left">
				      <i class="fa fa-building"></i>
				    </div>
			      </div>
			    </div>
			  </div>
			</div>

			<div id="counsel_field" class="field is-horizontal" style="display:none">
			  <div class="field-label">
			  	<label class="label">Can Represent Clients?</label>
			  </div>
			  <div class="field-body">
			    <div class="field is-narrow">
			      <div class="control">
			        <label class="radio">
			          <input type="radio" id="counsel" name="counsel" value="1">
			          Yes
			        </label>
			        <label class="radio">
			          <input type="radio" id="counsel" name="counsel" value="0" checked>
			          No
			        </label>
			      </div>
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
			  <div class="field-label is-normal">
			  	<label class="label">Optional Fields</label>
			  </div>
			  <div class="field-body">
			    <div class="field">
			      <p class="control is-expanded has-icons-left">
			        <input class="input @if ($errors->has('corp_name')) is-danger @endif" id="corp_name" name="corp_name" value="{{ old('corp_name') }}" type="text" placeholder="Entity's Full Legal Name">
			        <span class="icon is-small is-left">
			          <i class="fa fa-building-o"></i>
			        </span>
			        @if ($errors->has('corp_name'))
			        	<p class="help is-danger">{{ $errors->first('corp_name') }}</p>
					@endif
			      </p>
			    </div>
			    <div class="field">
			      <p class="control is-expanded has-icons-left">
			        <input class="input @if ($errors->has('dba')) is-danger @endif" id="dba" name="dba" value="{{ old('dba') }}" type="text" placeholder="DBA">
			        <span class="icon is-small is-left">
			          <i class="fa fa-building-o"></i>
			        </span>
			        @if ($errors->has('dba'))
			        	<p class="help is-danger">{{ $errors->first('dba') }}</p>
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
			        <input class="input @if ($errors->has('branch')) is-danger @endif" id="branch" name="branch" value="{{ old('branch') }}" type="text" placeholder="Branch Name">
			        <span class="icon is-small is-left">
			          <i class="fa fa-suitcase"></i>
			        </span>
			        @if ($errors->has('branch'))
			        	<p class="help is-danger">{{ $errors->first('branch') }}</p>
					@endif
			      </p>
			    </div>
			    <div class="field">
			      <p class="control is-expanded has-icons-left">
			        <input class="input @if ($errors->has('ein')) is-danger @endif" id="ein" name="ein" value="{{ old('ein') }}" type="text" placeholder="EIN">
			        <span class="icon is-small is-left">
			          <i class="fa fa-institution"></i>
			        </span>
			        @if ($errors->has('ein'))
			        	<p class="help is-danger">Employer ID Numbers must be formatted as XX-XXXXXXX</p>
					@endif
			      </p>
			    </div>
			    <div class="field is-narrow">
			      <div class="control has-icons-left">
			        <div class="select is-fullwidth">
			          <select id="corp_state" name="corp_state">
			          	<option disabled selected value>Incorporated State</option>
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
						<option value="KY">Kentucky</option>
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
			  </div>
			</div>

			<div class="field is-horizontal">
			  <div class="field-label is-normal">
			  </div>
			  <div class="field-body">
			    <div class="field">
			      <p class="control is-expanded has-icons-left">
			        <input class="input @if ($errors->has('work_phone')) is-danger @endif" id="work_phone" name="work_phone" value="{{ old('work_phone') }}" type="tel" placeholder="Business Phone">
			        <span class="icon is-small is-left">
			          <i class="fa fa-phone"></i>
			        </span>
			        @if ($errors->has('work_phone'))
			        	<p class="help is-danger">Phone numbers must be formatted as XXX-XXX-XXXX</p>
					@endif
			      </p>
			    </div>
			    <div class="field">
			      <p class="control is-expanded has-icons-left">
			        <input class="input @if ($errors->has('website')) is-danger @endif" id="website" name="website" value="{{ old('website') }}" type="text" placeholder="Website">
			        <span class="icon is-small is-left">
			          <i class="fa fa-link"></i>
			        </span>
			        @if ($errors->has('website'))
			        	<p class="help is-danger">{{ $errors->first('website') }}</p>
					@endif
			      </p>
			    </div>
			    <div class="field">
			      <p class="control is-expanded has-icons-left">
			        <input class="input @if ($errors->has('fax')) is-danger @endif" id="fax" name="fax" value="{{ old('fax') }}" type="tel" placeholder="Fax">
			        <span class="icon is-small is-left">
			          <i class="fa fa-fax"></i>
			        </span>
			        @if ($errors->has('fax'))
			        	<p class="help is-danger">Fax numbers must be formatted as XXX-XXX-XXXX</p>
					@endif
			      </p>
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
			        <button type="submit" class="button is-primary">Create Organization</button>
			      </div>
			    </div>
			  </div>
			</div>
		</form>
    </div>
  </section>
  <div style="height:250px;"></div>
@endsection

@section('javascript')
	<script type="text/javascript">
		window.onload=function() {
		  document.getElementById("type_id").onchange=function() {
		    var type_id = this.value;
		    if (type_id=="3") {
		        document.getElementById('counsel_field').style.display = 'flex';
			} else {
			    document.getElementById('counsel_field').style.display = 'none';
			}
		  } 
		}
    </script>
@endsection