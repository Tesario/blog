@extends('layouts.app')
@section('title', $user->name . ' | Edit profile')

@section('content')
    <section id="posts" class="container">
        <div class="d-flex align-items-center flex-column">
            <h2>
                {{ $user->name }} | Edit profile
            </h2>
            <div class="card half-width">
                <div class="card-body">
                    <form method="post" action="{{ action('ProfileController@update', $profile->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <h2>Infomations:</h2>
                        <ul class="edit">
                            <li>
                                <div class="form-floating w-100">
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="floatingInput" value="{{ $user->name }}" placeholder="Name" />
                                    <label for="floatingInput">Name</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-floating">
                                    <select name="gendar" class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <option value="1" {{ $profile->gendar ? 'selected' : '' }}>
                                            Male
                                        </option>
                                        <option value="0" {{ $profile->gendar ? '' : 'selected' }}>
                                            Female
                                        </option>
                                    </select>
                                    <label for="floatingSelect">Gendar</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-floating w-100">
                                    <input name="birthdate" type="text"
                                        class="form-control @error('birthdate') is-invalid @enderror" id="floatingInput"
                                        value="{{ $profile->getRawOriginal('birthdate') }}" placeholder="Birthday" />
                                    <label for="floatingInput">Birthday</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-floating w-100">
                                    <input name="school" type="text"
                                        class="form-control @error('school') is-invalid @enderror" id="floatingInput"
                                        value="{{ $profile->school }}" placeholder="School" />
                                    <label for="floatingInput">School</label>
                                </div>
                            </li>
                            <li>
                                <div class="form-floating w-100">
                                    <input name="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" id="floatingInput"
                                        value="{{ $profile->address }}" placeholder="Address" />
                                    <label for="floatingInput">Address</label>
                                </div>
                            </li>
                            <li>
                                <div class="file-input">
                                    <input name="image" type="file"
                                        class="form-control @error('image') is-invalid @enderror" aria-label="file example">
                                </div>
                            </li>
                        </ul>
                        <div class="button-group">
                            <a href="{{ url('user/' . $user->id . '/profile') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Done</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
