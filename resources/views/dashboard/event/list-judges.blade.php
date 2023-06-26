@extends('layouts.app')

@section('title', 'Event')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Judge List untuk Event {{ $event->name }}</h1>
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
                    <div class="card-header">
                        <a href="#" data-toggle="modal" data-target="#judgeModal"
                            class="btn btn-primary rounded">Tambah Juri</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <thead>
                                    <tr>
                                        <th>Nama Juri</th>
                                        <th>No Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($judges as $judge)
                                        <tr>
                                            <td>{{ $judge->full_name }}</td>
                                            <td>{{ $judge->phone_number }}</td>
                                            <td>
                                                <a href="#" data-id="{{ $judge->id }}"
                                                    class="btn btn-danger del-btn">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <form id="delete-form" action="{{ route('dashboard.event.judges.delete', $event->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="judge" id="judge">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="judgeModal">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('dashboard.event.judges.store', $event->id) }}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Juri: </label>
                        <select name="judge" class="form-control form-control-sm">
                            <option value="">Pilih</option>
                            @foreach ($judgeData as $j)
                                <option value="{{ $j->id }}">{{ $j->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('.del-btn').on('click', function(e) {
            let id = $(this).data("id");
            $('#judge').val(id);
            $('#delete-form').submit();
            e.preventDefault();
        });
    </script>
@endpush
