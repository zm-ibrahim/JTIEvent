@extends('layouts.app')

@section('title', 'Event')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Add Event Form</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <form method="post" action="{{ route('dashboard.event.store') }}" class="needs-validation" novalidate=""
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo"
                                name="photo" onchange="imagePreview()">
                            <img class="image-preview img-fluid mt-3 col-sm-5">
                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Event</label>
                            <input id="name" name="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                required="">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="start_date">Tanggal Dimulai</label>
                            <input id="start_date" name="start_date" type="date"
                                class="form-control @error('start_date') is-invalid @enderror"
                                value="{{ old('start_date') }}" required="">
                            @error('start_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="end_date">Tanggal Berakhir</label>
                            <input id="end_date" name="end_date" type="date"
                                class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}"
                                required="">
                            @error('end_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea style="height: 100px" id="description" name="description"
                                class="form-control @error('description') is-invalid @enderror" required="">
                                {{ old('description') }}
                            </textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        function imagePreview() {
            const image = document.querySelector('#photo');
            const imgPreview = document.querySelector('.image-preview');

            const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endpush
