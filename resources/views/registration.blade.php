@extends('layouts.app')

@section('title', 'CONTACTS | LYNQ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/registration-styles.css') }}">
    <style>
        body {
            background-image: url("{{ asset('images/Wavy-design.svg') }}");
            background-repeat: no-repeat;
            background-position: left center;
            background-size: auto 100%;
        }
    </style>
@endsection

@section('content')
<body>
    <header>
        <a href="{{ route('landing_page') }}"><i class="fa-solid fa-arrow-left"></i></a>
    </header>
    <div class="main-content-wrapper">
        <div class="logo-name-container">
            <h1 class="main-logo">LYN</h1><h1 class="special-q">Q</h1>
        </div>
        <div class="form-container">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <h2>Register</h2>

                <div class="full-name-row">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                        @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                        @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input class="input-box" type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</body>
@endsection
