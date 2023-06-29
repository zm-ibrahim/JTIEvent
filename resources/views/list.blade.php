<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>JTI Event | List Event</title>
    <link rel="icon" type="landing/image/x-icon" href="landing/assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    @yield('style')
    {{-- <link href="{{ asset('landing/css/styles.css') }}" rel="stylesheet" /> --}}
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <nav class="navbar navbar-expand-lg bg-primary">
                <a class="navbar-brand" href="#">JTI - Event</a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarBav">
                    @if (auth()->check())
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#">List</a></li>
                        </ul>
                    @else
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                            <li class="nav-item"><a class="nav-link" href="/list">List</a></li>
                        </ul>
                    @endif
                </div>
            </nav>
            <div class="main-content">
                <div class="section-body">
                    <h2 class="section-title">List Event</h2>
                    <div class="row">
                        @foreach ($events as $event)
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                                <article class="article article-style-b">
                                    <div class="article-header">
                                        <div class="article-image"
                                            @if ($event->photo) data-background="{{ $event->photo }}"
                                            @else
                                            data-background="../assets/img/news/img13.jpg"
                                            style="background-image: url(&quot;../assets/img/news/img13.jpg&quot;);" @endif>
                                        </div>
                                    </div>
                                    <div class="article-details">
                                        <div class="article-title">
                                            <h2><a href="#">{{ $event->name }}</a>
                                            </h2>
                                        </div>
                                        <p>{{ Str::limit($event->description, 60) }}</p>
                                        <small>Waktu Mulai : {{ $event->start_date }}</small><br>
                                        <small>Waktu Selesai : {{ $event->end_date }}</small>
                                        <div class="article-cta">
                                            <a href="{{ route('ShowEvent', $event->id) }}">Read More <i
                                                    class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50">
            <div class="container px-4 px-lg-5">Copyright &copy; JTEVENTSKDNAKNK 2023</div>
        </footer>
        <!-- General JS Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="../assets/js/stisla.js"></script>

        <!-- JS Libraies -->

        <!-- Template JS File -->
        <script src="../assets/js/scripts.js"></script>
        <script src="../assets/js/custom.js"></script>

</body>
</div>

</html>
