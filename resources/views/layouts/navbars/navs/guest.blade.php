<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="{{ route('home') }}">{{ $activePage }}</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link welcome-navbar">
            <i class="material-icons welcome-navbar">dashboard</i> {{ __('Dashboard') }}
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'register' ? ' active' : '' }}">
          <a href="{{ route('register') }}" class="nav-link welcome-navbar">
            <i class="material-icons welcome-navbar">person_add</i> {{ __('Register') }}
          </a>
        </li>
        <li class=" nav-item{{ $activePage == 'login' ? ' active' : '' }}">
          <a href="{{ route('login') }}" class="nav-link welcome-navbar">
            <i class="material-icons welcome-navbar">fingerprint</i> {{ __('Login') }}
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
          <a href="{{ route('profile.edit') }}" class="nav-link welcome-navbar">
            <i class="material-icons welcome-navbar">face</i> {{ __('Profile') }}
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->