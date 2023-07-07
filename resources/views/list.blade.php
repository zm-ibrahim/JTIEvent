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
                @include('landing.nav');
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
                                            @if ($event->photo) data-background="{{ asset('storage/' . $event->photo) }}"
                                            @else
                                            data-background="{{ asset('assets/img/news/img13.jpg') }}" @endif>
                                        </div>
                                        {{-- Started --}}
                                        <div class="article-badge">
                                            @if ($event->start_date <= now() && $event->end_date >= now())
                                                <div class="article-badge-item bg-warning"><i
                                                        class="fas fa-calendar-check"></i> Started</div>
                                            @elseif ($event->end_date < now())
                                                <div class="article-badge-item bg-danger"><i
                                                        class="fas fa-hourglass-end"></i> Ended</div>
                                            @endif
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
                                            @if ($event->end_date < now())
                                                Read More <i class="fas fa-chevron-right"></i>
                                            @else
                                                <a href="{{ route('ShowEvent', $event->id) }}">Read More <i
                                                        class="fas fa-chevron-right"></i></a>
                                            @endif
                                        </div>

                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @include('landing.foot');

</body>
</div>

</html>
