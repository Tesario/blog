@extends('layouts.app')
@section('title', 'Articles' . (isset($title) ? ' by ' . $title : ''))


@section('content')

    <section id="posts" class="container">
        <div class="d-flex justify-content-between">
            <h2>
                Articles {!! isset($title) ? 'by <a href=' . url('user/' . $user_id . '/profile') . '>' . $title . '</a>' : '' !!}
            </h2>
        </div>
        <div>
            {{-- <livewire:user-categories :user_id="$user_id"> --}}
            @livewire('user-categories', ['user_id' => $user_id])
    </section>
@endsection
