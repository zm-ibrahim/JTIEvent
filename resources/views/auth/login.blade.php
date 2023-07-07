@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
                <img src="{{ asset('assets/img/pwlBesar.png') }}" alt="logo" width="100" class="shadow-light rounded">
            </div>

            <div class="card card-primary">
                <div class="card-header">
                    <h4>Login</h4>
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

                    <form method="POST" action="{{ url('login') }}" class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" tabindex="1" autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="control-label ">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-5 text-muted text-center">
                Don't have an account? <a href="{{ route('registerPage') }}">Create One</a>
            </div>
            <div class="simple-footer">
                Copyright &copy; JTEVENTSKDNAKNK 2023
            </div>
        </div>
    </div>
@endsection
