<div class="container px-4 px-lg-5">
    <a class="navbar-brand" href="#page-top">JTI | Event</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
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
</div>
