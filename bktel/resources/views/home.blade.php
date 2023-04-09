@extends('layouts.app')

@section('content')
    <side-bar-component
    :logout_url = "'{{ route('logout') }}' " 
    ></side-bar-component>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <h1 class="text-3xl font-bold underline">
                        Hello world!
                    </h1>
                    <example-component></example-component>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
