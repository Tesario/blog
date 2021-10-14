@extends('layouts.app')
@section('title', 'Article editing | ' . $post->title)

@section('content')

    <section class="container d-flex justify-content-center">
        <div style="max-width:700px; width:100%">
            <h2>Article editing</h2>
            <form method="post" action="{{ action('PostController@update', $post->id) }}">
                <div class="card my-3 w-100">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="post-header d-flex align-items-center justify-content-between">
                            <div class="form-floating w-100">
                                <input name="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="floatingInput" value="{{ $post->title }}" placeholder="Title" />
                                <label for="floatingInput">Title</label>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="form-floating w-100">
                                <textarea name="text" class="form-control @error('text') is-invalid @enderror"
                                    placeholder="Article" id="floatingTextarea2"
                                    style="height: 200px">{!! strip_tags($post->text) !!}</textarea>
                                <label for="floatingTextarea2">Article</label>
                            </div>
                        </div>
                        <select name="category_id" class="form-select btn btn-primary">
                            @foreach ($categories as $category)
                                <option @if ($category->id == $post->category_id) selected @endif value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="button-group d-flex">
                    <a href="{{ url('/post') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Done</button>
                </div>
            </form>
        </div>
    </section>

@endsection
