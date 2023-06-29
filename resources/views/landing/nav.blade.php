<a class="navbar-brand" href="/">JTI - Event</a>
<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav"
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarBav">
    @if (auth()->check())
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="/list">List</a></li>
        </ul>
    @else
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            <li class="nav-item"><a class="nav-link" href="/list">List</a></li>
        </ul>
    @endif
</div>
