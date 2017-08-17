@extends('layouts.app')

@section('content')
  <section class="section">
    <div style="height:150px;"></div>
    <div class="container">
      <h1 class="title">Create New File/Matter</h1>
      <h2 class="subtitle">Add a new file to the RLO Portal</h2>
      <hr>

      <form method="POST" action="/files/create">
      {{ csrf_field() }}
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Firm</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control has-icons-left">
              <div class="select is-fullwidth">
                <select id="counsel_id" name="counsel_id">
                    @foreach ($firms as $firm)
                      <option value="{{ $firm->id}}">{{ $firm->display_name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="icon is-small is-left">
              <i class="fa fa-balance-scale"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Primary Client</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control has-icons-left">
              <div class="select is-fullwidth">
                <select id="client_id" name="client_id">
                    @foreach ($contacts as $contact)
                      <option value="{{ $contact->id}}">{{ $contact->display_name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="icon is-small is-left">
              <i class="fa fa-address-book-o"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">File Type</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control has-icons-left">
              <div class="select is-fullwidth">
                <select id="file_type_id" name="file_type_id">
                    @foreach ($file_types as $type)
                      <option value="{{ $type->id}}">{{ $type->title }}</option>
                    @endforeach
                </select>
              </div>
              <div class="icon is-small is-left">
              <i class="fa fa-archive"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Source</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control has-icons-left">
              <div class="select is-fullwidth">
                <select id="source_id" name="source_id">
                    @foreach ($sources as $source)
                      <option value="{{ $source->id}}">{{ $source->title }}</option>
                    @endforeach
                </select>
              </div>
              <div class="icon is-small is-left">
              <i class="fa fa-exchange"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="general_referral" class="field is-horizontal" style="display:none">
        <div class="field-label is-normal">
          <label class="label">Contact That Gave Referral</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control has-icons-left">
              <div class="select is-fullwidth">
                <select id="referral_id" name="referral_id">
                    <option disabled selected value>Select Referral Contact</option>
                    @foreach ($contacts as $contact)
                      <option value="{{ $contact->id}}">{{ $contact->display_name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="icon is-small is-left">
              <i class="fa fa-address-book-o"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="firm_referral" class="field is-horizontal" style="display:none">
        <div class="field-label is-normal">
          <label class="label">Firm That Gave Referral</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control has-icons-left">
              <div class="select is-fullwidth">
                <select id="referral_id" name="referral_id">
                    <option disabled selected value>Select Referral Firm</option>
                    @foreach ($referralfirms as $referralfirm)
                      <option value="{{ $referralfirm->id}}">{{ $referralfirm->display_name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="icon is-small is-left">
              <i class="fa fa-balance-scale"></i>
              </div>
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
              <button type="submit" class="button is-primary">Create Matter</button>
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
      document.getElementById("source_id").onchange=function() {
        var source_id = this.value;
        if (source_id=="1") {
            document.getElementById('general_referral').style.display = 'flex';
        } else {
            document.getElementById('general_referral').style.display = 'none';
        }
        if (source_id=="2") {
            document.getElementById('firm_referral').style.display = 'flex';
        } else {
            document.getElementById('firm_referral').style.display = 'none';
        }
      } 
    }
    </script>
@endsection