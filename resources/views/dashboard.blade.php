@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Dashboard</h1>
    <div class="card shadow-lg">
        <div class="card-body">
            <h3>Welcome, {{ Auth::user()->name }}!</h3>

            @if(Auth::user()->picture)
                <div class="text-center mb-3">
                    <img src="{{ asset('storage/' . Auth::user()->picture) }}" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                </div>
            @else
                <div class="text-center mb-3">
                    <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile Picture" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                </div>
            @endif

            <p>This is your dashboard where you can manage your account and more.</p>
            <hr>
            <div class="text-center">
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>
@endsection
