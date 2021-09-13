@extends('layouts.app')

@section('content')
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
                        <p>
                            @if (auth()->user()->hasRole('super_admin') || auth()->user()->hasRole('admin'))
                                <a href="{{ route('admin.home') }}" class="btn btn-primary">Dashboard</a>
                            @elseif(auth()->user()->hasRole('provider'))
                                <a href="{{ route('provider.home') }}" class="btn btn-primary">Dashboard</a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
