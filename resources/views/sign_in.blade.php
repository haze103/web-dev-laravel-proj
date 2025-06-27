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

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email Field --}}
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    {{-- Password Field --}}
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    {{-- Show Password Toggle --}}
                    <div class="form-group mt-2">
                        <label>
                            <input type="checkbox" onclick="togglePassword()"> Show Password
                        </label>
                    </div>

                    {{-- Remember Me --}}
                    <div class="form-group mt-2">
                        <label for="remember">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            Remember Me
                        </label>
                    </div>

                    <button type="submit" class="sign-in-btn mt-3">Sign In</button>

                    <h6><a href="{{ route('password.request') }}">Forgot Your Password?</a></h6>
                    <p>Don't have an account yet? <a href="{{ route('registration') }}">Register here</a></p>
                </form>
            </div>
        </div>
    </main>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById("password");
            passwordField.type = passwordField.type === "password" ? "text" : "password";
        }
    </script>
</body>
@endsection
                                        