@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>User Role</h4>
                            </div>
                            <div class="card-body">
                                <small>{{ auth()->user()->role }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Event Participates</h4>
                            </div>
                            <div class="card-body">
                                {{ $eventCount }}
                            </div>
                        </div>
                    </div>
                </div>
                @if (auth()->user()->role == 'PARTICIPANT')
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="far fa-star"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Score</h4>
                                </div>
                                <div class="card-body">
                                    {{ $scoreCount }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection
