@extends('layouts.app')

@section('title', 'SIGN IN | LYNQ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/sign_in_styles.css') }}">
@endsection

@section('content')
<body>
    <header>
        <a href="{{ route('landing_page') }}"><i class="fa-solid fa-arrow-left"></i></a>
    </header>
    <main>
        <div class="logo-container">
            <h1><span class="lyn">LYN</span><span class="q-logo">Q</span></h1>
            <h5>connecting leads. closing deals</h5>
        </div>
        <img src="{{ asset('/images-icons/wave.svg') }}" alt="waves" class="wave-img"> 
        <div class="sign-in-form">
            <div class="sign-in-card">
                <h1>Sign In</h1>
                <label for="email-add">Email</label>
                <input type="email" id="email-add" name="email-add" required>

                <label for="user-password">Password</label>
                <input type="password" id="user-password" name="user-password" required>

                <label for="remember-user"><input type="checkbox" id="remember-user">Remember Me</label>

                <button type="submit" class="sign-in-btn">Sign In</button>

                <h6><a href="#">Forgot Your Password</a></h6>

                <p>Don't have an account yet? <a href="#">Register here</a></p>
            </div>
        </div>
    </main>
</body>
@endsection