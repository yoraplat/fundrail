<!--
<div class="container" id="nav-container">
    <div class="row">
        <div class="col"><a href="/"><img src="{{ asset("/img/logo.png") }}" alt="" id="logo"></a></div>
        <div class="col text-center"><a href="/projects">Projects</a></div>
        @if (Auth::check())
            @if (auth()->user()->isAdmin())
            <div class="col text-center"><a href="/admin/projects">Admin Dashboard</a></div>
            @endif
        <div class="col text-center"><a href="/dashboard">Dashboard</a></div>
        <div class="col text-center"><a href="/logout">Logout</a></div>
        <p>{{ auth()->user()->name}} <br> Credits: {{ auth()->user()->credits}}</p>
        @else
        <div class="col text-center"><a href="/login">Login</a> / <a href="/register">Register</a></div>
        @endif
    </div>
</div>
-->
      
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/"><img src="{{ asset('/img/logo.png') }}" alt="" id="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/">Homepage <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/projects">Projects</a>
      </li>
      @if (Auth::check())
      <li class="nav-item">
        <a class="nav-link" href="/dashboard">Dashboard</a>
      </li>

      <li class="nav-item">
      @if (auth()->user()->isAdmin())
        <a class="nav-link" href="/admin/projects">Admin Dashboard</a>
        @endif
      </li>
      @endif
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          User
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @if (Auth::check())
          <a class="dropdown-item" href="/logout">Logout</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/profile">{{ auth()->user()->name}} <br> Credits: {{ auth()->user()->credits}}</a>
        @else
          <a class="dropdown-item" href="login">Login</a>
          <a class="dropdown-item" href="register">Register</a>
        @endif
          
        </div>
      </li>
    </ul>
  </div>
</nav>
</div>

