<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/img/RLOicon.png" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <section id="law-nav" class="is-sticky{{ set_hidden('login') }}">
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
                <div class="nav-right nav-menu" :class="{ 'is-active': showNav }">
                  <a href="/desk" class="nav-item{{ set_active('desk*') }}">Desk</a>
                  <a href="/fileroom" class="nav-item{{ set_active('fileroom*') }}">File Room</a>
                  <a href="/conference" class="nav-item{{ set_active('conference*') }}">Conference Room</a>
                  <a href="/accounting" class="nav-item{{ set_active('accounting*') }}">Accounting</a>
                  <span class="nav-item">
                    <a href="/login" class="button is-primary is-inverted">
                      <span class="icon"><i class="fa fa-sign-in"></i></span>
                      <span>Login</span>
                    </a>
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
                            <li class="{{ set_active('files') }}"><a href="/files">All Files</a></li>
                            <li class="{{ set_active('files/leads') }}"><a href="/files/leads">Leads</a></li>
                            <li class="{{ set_active('files/pre') }}"><a href="/files/pre">Pre-Litigation</a></li>
                            <li class="{{ set_active('files/litigation') }}"><a href="/files/litigation">Litigation</a></li>
                            <li class="{{ set_active('files/closed') }}"><a href="/files/closed">Closed</a></li>
                            <li class="{{ set_active('files/create') }}"><a href="/files/create">New File</a></li>
                        </ul>
                    </div>
                </nav>
            </div>

            
        </div>
        <nav class="navbar has-shadow{{ set_shown('files*') }}">
            <div class="navbar-brand container">
                <a class="navbar-item is-tab " href="/">Matter</a>
                <a class="navbar-item is-tab " href="/">Client</a>
                <a class="navbar-item is-tab " href="/">Intake</a>
            </div>
        </nav>
    </section>

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
</body>
</html>
