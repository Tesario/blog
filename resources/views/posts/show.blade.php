@extends('layouts.app')
@section('title','Article | ' . $post->title)

@section('content')

<section class="container d-flex justify-content-center">
    <div style="max-width:700px; width:100%">
        <h2>Article by <a href="/user/{{ $post -> user -> id }}">{{ $post -> user -> name ?? "unknown" }}</a></h2>
        <div class="card">
            <div class="card-body">
                <div class="post-header d-flex align-items-end">
                    <h3 class="card-title">{{$post -> title}}</h3>
                    <span>&nbsp;/ {{ $post-> created_at }}</span>
                </div>
                <p class="card-text show-all mb-3">
                    {!!$post -> text!!}
                </p>
                <div class="d-flex justify-content-end">
                    <a href="/category/{{ $post -> category_id }}">- {{ $post -> category -> name }}</a>
                </div>
            </div>
        </div>
        <div class="button-group d-flex">
            <a href="{{ URL::previous() }}" class="btn btn-secondary">Back</a>
            @can('edit-post', $post)
                <a href="{{ url('post/'.$post -> id .'/edit') }}" class="btn btn-warning">Edit</a>
                <form action="{{action('PostController@destroy', $post->id)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endcan
        </div>
    </div>
</section>

@endsection