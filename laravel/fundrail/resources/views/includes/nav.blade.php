
<div class="container" id="nav-container">
    <div class="row">
        <div class="col"><a href="/"><img src="{{ asset("/img/logo.png") }}" alt="" id="logo"></a></div>
        <div class="col text-center"><a href="/projects">Projects</a></div>
        @if (Auth::check())
            @if (auth()->user()->isAdmin())
            <div class="col text-center"><a href="/admin">Admin Dashboard</a></div>
            @endif
        <div class="col text-center"><a href="/dashboard">Dashboard</a></div>
        <div class="col text-center"><a href="/logout">Logout</a></div>
        @else
        <div class="col text-center"><a href="/login">Login</a> / <a href="/register">Register</a></div>
        @endif
    </div>
</div>
