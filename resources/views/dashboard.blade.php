@extends('layouts.app')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Welcome, {{ Auth::user()->name }}</h3>
        </div>
        <div class="card-body">
            <p class="lead">You are logged in with mobile: <strong>{{ Auth::user()->mobile }}</strong></p>

            <hr>

            <div class="mb-3">
                <a href="{{ route('members.create') }}" class="btn btn-outline-primary me-2">➕ Add More Information</a>
            </div>
        </div>
    </div>
@endsection


