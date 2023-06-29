<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>JTI Event | Event {{ $event->name }}</title>
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

<div id="app">

    <body class="layout-3">
        <div class="main-wrapper container">
            <nav class="navbar navbar-expand-lg bg-primary">
                @include('landing.nav');
            </nav>
            <div class="main-content">
                <div class="section-body">
                    <h2 class="section-title">Event Detail</h2>
                    <p class="section-lead">
                        @if (auth()->check())
                            @if (auth()->user()->role == 'PARTICIPANT')
                                <a class="btn btn-primary" href="#">Ikuti</a>
                            @else
                                Anda harus login sebagai Participant untuk dapat mengikuti kegiatan
                            @endif
                        @else
                            Anda harus login sebagai Participant untuk dapat mengikuti kegiatan
                        @endif
                    </p>
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $event->name }}</h4>
                        </div>
                        <div class="card-body">
                            @if ($event->photo)
                                <img src="{{ $event->photo }}" alt="Event Photo">
                            @endif
                            <p>{{ $event->description }}</p>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            Waktu Mulai : {{ $event->start_date }} | Waktu Selesai : {{ $event->end_date }}
                        </div>

                    </div>

                </div>
            </div>
        </div>
        @include('landing.foot');

    </body>
</div>

</html>
