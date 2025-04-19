@extends('layouts.app')

@section('content')
    <div class="text-center mt-5">
        <h1>403 - Unauthorized</h1>
        <p>You are not allowed to view this member.</p>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
    </div>
@endsection
