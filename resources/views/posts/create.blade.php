@extends('layouts.app')
@section('title','Article creating')

@section('content')

<section class="container d-flex justify-content-center">
    <div style="max-width:700px; width:100%">
        <h2>Article creating</h2>
        <div class="card">
            <div class="card-body">
                <form action="/post" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="floatingInput" value="{{ old('title') }}" placeholder="Title">
                        <label for="floatingInput">Title</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea name="text" class="form-control @error('text') is-invalid @enderror" value="{{ old('text') }}" placeholder="Article" id="floatingTextarea2" style="height: 200px"></textarea>
                        <label for="floatingTextarea2">Article</label>
                    </div>

                    <div class="d-flex">
                        <select name="category_id" class="form-select btn btn-primary">
                            @foreach ($categories as $category)
                                <option value="{{ $category -> id }}">{{ $category ->name }}</option>
                            @endforeach
                        </select>

                        <div class="w-100 d-flex justify-content-end">
                            <a href="{{ URL::previous() }}" class="mx-2 btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection