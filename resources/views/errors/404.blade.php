@extends('layouts.app')
@section('title','Error 404')

@section('content')

<section class="container mt-3">
    <div class="d-flex align-items-center flex-column mt-3">
        <h1 class="btn btn-danger disabled">Page not found - 404</h1>
        <a href="{{ url('/post') }}" class="btn btn-secondary">Back to articles</a>
    </div>
</section>

@endsection