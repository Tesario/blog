@extends('layouts.app')
@section('title','Error 403')

@section('content')

<section class="container mt-3">
    <div class="d-flex align-items-center flex-column mt-3">
        <h1 class="btn btn-danger disabled">This action is unauthorized</h1>
        <a href="{{ url('/post') }}" class="btn btn-secondary">Back to articles</a>
    </div>
</section>

@endsection