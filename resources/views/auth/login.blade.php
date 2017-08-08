@extends('layouts.app')

@section('content')

<section class="hero is-success is-fullheight">
<div class="hero-body columns is-mobile is-centered">
  <div class="column is-mobile is-half-tablet is-one-third-desktop">
  <article class="message is-large">
  <div class="message-header">
    <a href="/" class="nav-item">
                    <img src="/img/rloky.png" alt="Logo">
                  </a>
  </div>
  <div class="message-body">

    <form role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="field">
                          <p class="control has-icons-left has-icons-right">
                            <input id="email" name="email" type="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" value="{{ old('email') }}" placeholder="Email" required autofocus>
                            <span class="icon is-small is-left">
                              <i class="fa fa-envelope"></i>
                            </span>
                          </p>
                          @if ($errors->has('email'))
                            <p class="help is-danger">{{ $errors->first('email') }}</p>
                          @endif
                        </div>
                        <div class="field">
                          <p class="control has-icons-left">
                            <input id="password" name="password" type="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" placeholder="Password" required>
                            <span class="icon is-small is-left">
                              <i class="fa fa-lock"></i>
                            </span>
                          </p>
                          @if ($errors->has('password'))
                            <p class="help is-danger">{{ $errors->first('password') }}</p>
                          @endif
                        </div>
                        <div class="field is-grouped">
                          <p class="control">
                            <button type="submit" class="button is-info">Login</button>
                          </p>
                          <p class="control">
                            <a class="button is-light" href="{{ route('password.request') }}">Forgot Password?</a>
                          </p>
                        </div>
                    </form>
                    </div>
                    </article>
                    <div style="height:100px;"></div>
  </div>
</div>
</section>
@endsection
