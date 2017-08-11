<!DOCTYPE html>
<html lang="en" style="background-color: #5EAB00; ">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/img/RLOicon.png" />
    <link rel="manifest" href="/manifest.json">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RLO Portal</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body style="background-color:#FFFFFF;">
    @if (Auth::check())
    <section id="law-nav" class="is-sticky">
        <div class="hero is-primary">
          <div class="hero-head">
            <header class="nav">
              <div class="container">
                <div class="nav-left">
                  <a href="/" class="nav-item">
                    <img src="/img/rloky.png" alt="Logo">
                  </a>
                </div>
                <span class="nav-toggle" @click="showNav = !showNav" :class="{ 'is-active': showNav }">
                  <span></span>
                  <span></span>
                  <span></span>
                </span>
                <div class="nav-right nav-menu" :class="{ 'is-active': showNav }" style="overflow: visible;">
                  <a href="/desk" class="nav-item{{ set_active('desk*') }}">Desk</a>
                  <a href="/files" class="nav-item{{ set_active('files*') }}">File Room</a>
                  <a href="/conference" class="nav-item{{ set_active('conference*') }}">Conference Room</a>
                  <a href="/contacts" class="nav-item{{ set_active('contacts*') }}">Contacts</a>
                  <span class="nav-item">
                    <div class="dropdown is-hoverable">
                      <div class="dropdown-trigger">
                        <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
                          <span>{{{ Auth::user()->name }}}</span>
                          <span class="icon is-small">
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                          </span>
                        </button>
                      </div>
                      <div class="dropdown-menu" id="dropdown-menu" role="menu">
                        <div class="dropdown-content">
                          <a href="#" class="dropdown-item" style="color:#7a7a7a; text-align:left;">View Profile</a>
                          <a href="#" class="dropdown-item" style="color: #7a7a7a; text-align:left;">View Firm</a>
                          <a href="#" class="dropdown-item" style="color: #7a7a7a; text-align:left;">View My Notes</a>
                          <a href="/accounting" class="dropdown-item" style="color: #7a7a7a; text-align:left;">Accounting</a>
                          <hr class="dropdown-divider">
                          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item" style="color: #7a7a7a; text-align:left;">Logout</a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        </div>
                      </div>
                    </div>
                  </span>
                </div>
              </div>
            </header>
          </div>

            <!-- Hero footer: for conference -->
            <div class="hero-foot{{ set_shown('conference') }}">
                <nav class="tabs is-boxed is-fullwidth">
                    <div class="container">
                        <ul>
                            <li class="is-active"><a>Chat</a></li>
                            <li><a>Reports</a></li>
                        </ul>
                    </div>
                </nav>
            </div>

            <!-- Hero footer: for fileroom -->
            <div class="hero-foot{{ set_shown('files*') }}">
                <nav class="tabs is-boxed is-fullwidth">
                    <div class="container">
                        <ul>
                            <li class="{{ set_active('files/*', array('files/leads','files/pre','files/litigation','files/closed','files/create')) }}"><a href="/files">File Details</a></li>
                            <li class="{{ set_active('files/leads') }}"><a href="/files/leads">Leads</a></li>
                            <li class="{{ set_active('files/pre') }}"><a href="/files/pre">Pre-Litigation</a></li>
                            <li class="{{ set_active('files/litigation') }}"><a href="/files/litigation">Litigation</a></li>
                            <li class="{{ set_active('files/closed') }}"><a href="/files/closed">Closed</a></li>
                            <li class="{{ set_active('files/create') }}"><a href="/files/create">New File</a></li>
                        </ul>
                    </div>
                </nav>
            </div>

            <!-- Hero footer: for contacts -->
            <div class="hero-foot{{ set_shown('contacts*') }}">
                <nav class="tabs is-boxed is-fullwidth">
                    <div class="container">
                        <ul>
                            <li class="{{ set_active('contacts/persons*') }}"><a href="/contacts/persons">Persons</a></li>
                            <li class="{{ set_active('contacts/organizations*') }}"><a href="/contacts/organizations">Organizations</a></li>
                        </ul>
                    </div>
                </nav>
            </div>

            
        </div>
        <!-- Hero footer: for files -->
        <nav class="navbar has-shadow{{ set_shown('files*') }}">
            <div class="navbar-brand container">
                <a class="navbar-item is-tab{{ set_active('*/matters') }}" href="/">Matters</a>
                <a class="navbar-item is-tab{{ set_active('*/clients') }}" href="/">Clients</a>
                <a class="navbar-item is-tab{{ set_active('*/forms') }}" href="/">Intake Forms</a>
            </div>
        </nav>

        <!-- Hero footer: for files -->
        <nav class="navbar has-shadow{{ set_shown('contacts/organizations*') }}">
            <div class="navbar-brand container">
                @php
                  $except = array();
                @endphp
                <a class="navbar-item is-tab{{ set_active('contacts/organizations/*', array('contacts/organizations/create')) }}" href="/contacts/organizations">Organization Details</a>
                <a class="navbar-item is-tab{{ set_active('contacts/organizations/create') }}" href="/contacts/organizations/create">New Organization</a>
            </div>
        </nav>
    </section>
    @endif

    @yield('content')

    <footer class="footer{{ set_hidden('login') }}">
      <div class="container">
        <div class="content has-text-centered">
          <p>
            <strong>RLO Staff Portal</strong> by <a href="https://DrewRoberts.com">Drew Roberts</a>.
          </p>
          <p>
            <a class="icon" href="https://rloky.com"><img src="/img/RLOicon.png" width="40px" height="40px"></a>
          </p>
        </div>
      </div>
    </footer>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript">
        new Vue({
          el: '#law-nav',
          data: {
            showNav: false
          }
        });
    </script>
    @yield('javascript')
    @if ($flash = session('message'))
        @include('layouts.flashmessage')
    @endif
</body>
</html>
