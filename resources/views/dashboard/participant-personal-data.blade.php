@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Personal Data</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{ session('name') }}!</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="card">
                <form method="post" action="{{ route('dashboard.profile.update') }}" class="needs-validation"
                    novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4>Personal Data</h4>
                    </div>
                    <div class="card-body">
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
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" name="full_name" type="text" class="form-control"
                                value="{{ $data->full_name }}" required="">
                            @error('full_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone</label>
                            <input id="phone_number" name="phone_number" type="tel" class="form-control"
                                value="{{ $data->phone_number }}" required="">
                            @error('phone_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="birth_date">Birth date</label>
                            <input id="birth_date" name="birth_date" type="date" class="form-control"
                                value="{{ $data->birth_date }}" required="">
                            @error('birth_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="school_name">School name</label>
                            <input id="school_name" name="school_name" type="text" class="form-control"
                                value="{{ $data->school_name }}" required="">
                            @error('school_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" name="password" type="password" class="form-control"
                                required="">
                            @error('password')
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
