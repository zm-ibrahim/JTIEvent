@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Blank Page</h1>
        </div>

        <div class="section-body">
            My role is {{ auth()->user()->role }}
        </div>
    </section>
@endsection
