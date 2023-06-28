@extends('layouts.app')

@section('title', 'Event')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>List Peserta yang Mengikuti Event {{ $event->name }}</h1>
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
                                        <th>Nama Peserta</th>
                                        <th>Asal Sekolah</th>
                                        <th>Nilai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participants as $p)
                                        <tr>
                                            <td>{{ $p->participant->full_name }}</td>
                                            <td>{{ $p->participant->school_name }}</td>
                                            <td>{{ $p->score ?? 'Belum dinilai' }}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-id="{{ $p->id }}"
                                                    data-target="#giveScoreModal" class="give-score btn btn-primary">Beri Nilai</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="card-footer text-right">
                        {{ $participants->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" tabindex="-1" role="dialog" id="giveScoreModal">
        <div class="modal-dialog" role="document">
            <form method="POST" action="" class="modal-content" id="give-score-form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Beri Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="score">Nilai:</label>
                        <input id="score" type="number" class="form-control @error('score') is-invalid @enderror"
                            name="score" tabindex="1" autofocus>
                        @error('score')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="give-score-btn">Save changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        const routeName = "{{ route('dashboard.event.index') }}";

        $('.give-score').click(function() {
            let id = $(this).data('id');
            // console.log(`${routeName}/${id}/give-score`)
            $('#give-score-form').attr('action', `${routeName}/${id}/give-score`);
            console.log('first')
        });
    </script>
@endpush
