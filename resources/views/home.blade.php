@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
                <a href="{{ url('/') }}" class="btn btn-primary mt-3">See articles</a>
            </div>
        </div>
    </section>
@endsection
