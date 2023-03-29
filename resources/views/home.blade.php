@extends('layouts.app')

@section('content')
    <meta http-equiv="refresh" content="2 ; URL=/">
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

                    </div>
                    <input type="button" onclick="location.href='/'" value="home画面に戻る">
                </div>
            </div>
        </div>
    </div>
@endsection
