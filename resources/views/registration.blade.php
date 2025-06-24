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
            <form>
                <h2>Register</h2>
                <div class="full-name-row">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" required>
                    </div>

                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" required>
                    </div>    
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input class="input-box" type="password" id="confirmPassword" name="confirmPassword" required>
                </div>
                
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</body>
@endsection