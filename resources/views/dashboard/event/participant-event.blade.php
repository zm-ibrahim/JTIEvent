@extends('layouts.app')

@section('title', 'Event')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Event yang Diikuti</h1>
        </div>
        <div class="section-body">
            @if (session()->has('failed'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ session('failed') }}
                    </div>
                </div>
            @elseif (session()->has('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>Nama Event</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Berakhir</th>
                                        <th>Skor</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $e)
                                        <tr>
                                            <td>{{ $e->event->name }}</td>
                                            <td>{{ $e->event->start_date }}</td>
                                            <td>{{ $e->event->end_date }}</td>
                                            <td>{{ $e->score }}</td>
                                            <td>
                                                <a href="#" class="btn btn-primary">Sertifikat</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="card-footer text-right">
                        {{ $events->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
