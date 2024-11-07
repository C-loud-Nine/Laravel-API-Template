@extends('layouts.app') <!-- Ensure you have a main layout file -->

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Create Your Account</h1>
    <div class="card shadow-lg">
        <div class="card-body">
            <form action="{{ route('registerUser') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Create a password" required>
                </div>
                <div class="mb-3">
                    <label for="picture" class="form-label">Profile Picture</label>
                    <input type="file" class="form-control" name="picture" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Sign Up</button>
            </form>
            <div class="text-center mt-3">
                <p>Already have an account? <a href="{{ route('login') }}">Log in here</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
