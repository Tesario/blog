@extends('layouts.app')
@section('title', $user->name)

@section('content')

    <section id="posts" class="container">
        <div class="d-flex align-items-center flex-column">
            <h2>
                {{ $user->name }}
            </h2>
            <div class="card half-width">
                <div class="card-body">
                    <div class="profile-wrapper">
                        <div>
                            <h2>Infomations:</h2>
                            <ul>
                                <li>Email: {{ $user->email }}</li>
                                <li>Articles: {{ $user->posts->count() }}</li>
                                <li>Gendar: {!! $profile->gendar ? '<i class="fas fa-mars"></i>' : '<i class="fas fa-venus"></i>' !!}</li>
                                <li>Birthday: {{ $profile->birthdate }}</li>
                                <li>School: {{ $profile->school }}</li>
                                <li>Address: {{ $profile->address }}</li>
                                <li>Acc creation: {{ date('j. n. Y', strtotime($profile->created_at)) }}</li>
                            </ul>
                        </div>
                        @if ($profile->image)
                            <div class="img-box">
                                <img src="{{ url('storage/' . $profile->image) }}" alt="profile">
                            </div>
                        @endif
                    </div>
                    <div class="button-group">
                        <a href="{{ url('user', $user->id) }}" class="btn btn-primary">User's articles</a>
                        @can('edit-profile', $profile)
                            <a href="{{ url('user/' . $user->id . '/profile/edit') }}" class="btn btn-warning">Edit</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
