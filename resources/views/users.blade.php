@extends('layouts.app')
@section('title', 'Users')


@section('content')

    <section id="posts" class="container">
        <div class="d-flex justify-content-between">
            <h2>
                Users
            </h2>
        </div>
        @livewire('users-search')
    </section>
@endsection
