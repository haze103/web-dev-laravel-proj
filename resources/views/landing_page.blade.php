@extends('layouts.app')

@section('title', 'LANDING PAGE | LYNQ')

@section('js')
    <script src="{{ asset('js/landingPage.js') }}"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/landing_page_styles.css') }}">
@endsection

@section('content')
<body id="landing-page-body">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <div class="logo-name-nav">
                    <h1 class="main-logo-nav">LYN</h1><h1 class="special-q-nav">Q</h1>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Sign-In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <section id="landing" class="landing">
        <div class="hero-container">
            <div class="logo-name-container">
                <h1 class="main-logo">LYN</h1><h1 class="special-q">Q</h1>
            </div>
            <p class="tagline">connecting leads. closing deals.</p>
            <a href="{{ route('login') }}" class="hero-button">Access LYNQ <span class="arrow">➔</span></a>
        </div>
    </section>

    <section id="about" class="about">
        <section class="about-section">
            <h1>ABOUT</h1>
            <p>
                <span class="p-span">LYNQ</span> is a simple and efficient lead management system that helps teams stay organized and improve the sales process. 
                It allows users to manage leads from first contact to final outcome, with features that support admins in setting up 
                workflows, managers in tracking progress, and sales representatives in following up effectively. Designed to be 
                user-friendly and reliable, LYNQ brings all lead information into one place, making it easier to stay on top of tasks 
                and close deals with confidence.
            </p>
        </section>
        <section class="core-principles-section">
            <h2>CORE PRINCIPLES</h2>
            <div class="principles-container">
                <div class="priciple">
                    <h3>Simplicity and clarity in every feature</h3>
                    <p>LYNQ is designed to be intuitive and easy to use. Every feature is built with a clear purpose, 
                        reducing clutter and helping users focus on what matters most—managing leads efficiently.
                    </p>
                </div>
                <div class="priciple">
                    <h3>Support for collaboration and productivity</h3>
                    <p>
                        LYNQ encourages teamwork by making it easy to assign leads, share updates, and track progress. 
                        It helps sales teams stay aligned, organized, and productive throughout the entire sales process.
                    </p>
                </div>
                <div class="priciple">
                    <h3>Focus on results and continuous improvement</h3>
                    <p>
                        LYNQ helps users take action and measure outcomes. With built-in reports and lead tracking, 
                        teams can identify what works, adapt quickly, and continuously improve their sales performance.
                    </p>
                </div>
            </div>
        </section>
        <section class="testimonials-section">
            <h2>TESTIMONIALS</h2>
            <div class="testimonial-carousel-container">
                <button class="carousel-arrow left-arrow" id="prevTestimonial">&#8592;</button>

                <div class="testimonial-cards-wrapper"> 
                    <div class="testimonial-card active"> 
                        <p class="quote">
                            "LYNQ gave our team the structure we needed. We've doubled our lead conversions just by keeping everything organized and easy to track."
                        </p>
                        <p class="author">
                            <span class="role">Sales Manager</span> – <span class="company">TechSolutions Inc.</span>
                        </p>
                    </div>

                    <div class="testimonial-card"> 
                        <p class="quote">
                            "Before LYNQ, our lead management was a mess. Now, our sales team is more efficient, and we're seeing a significant uplift in closed deals. Highly recommended!"
                        </p>
                        <p class="author">
                            <span class="role">Lead Gen Specialist</span> – <span class="company">Innovate Solutions</span>
                        </p>
                    </div>

                    <div class="testimonial-card"> 
                        <p class="quote">
                            "The simplicity of LYNQ is its genius. Our team adopted it quickly, and the collaboration features have been a game-changer for our remote sales efforts."
                        </p>
                        <p class="author">
                            <span class="role">VP Sales</span> – <span class="company">Global Connect</span>
                        </p>
                    </div>
                </div> 

                <button class="carousel-arrow right-arrow" id="nextTestimonial">&#8594;</button>
            </div>
        </section>
    </section>

    <footer>
        <div class="footer-contacts">
            <div class="email-footer">
                <i class="fa-regular fa-envelope footer-icon"></i>
                <h6><a href="mailto:support@lynq.com">support@lynq.com</a></h6>
            </div>
            <div class="phone-number-footer">
                <table class="contact-number">
                    <tr>
                        <i class="fa-regular fa-phone footer-icon"></i>
                    </tr>
                    <tr>
                        <td>USA  +1 8334200991</td>
                        <td>PH  (02) 8123 4567</td>
                    </tr>
                    <tr>
                        <td colspan="2">AUS  +61 1800960837</td>
                    </tr>
                </table>
            </div>
            <div class="socmed-footer">
                <h6>CONNECT WITH US</h6>
                <a href="#"><img src="{{ asset('images-icons/twitter.png') }}" alt="Twitter"></a>
                <a href="#"><img src="{{ asset('images-icons/linkedin.png') }}"  alt="LinkedIn"></a>
                <a href="#"><img src="{{ asset('images-icons/facebook.png') }}"  alt="Facebook"></a>
                <a href="#"><img src="{{ asset('images-icons/instagram.png') }}"  alt="Instagram"></a>
                <a href="#"><img src="{{ asset('images-icons/threads.png') }}"  alt="Threads"></a>
            </div>  
        </div>
        <p>
            <a href="#">Terms of Service</a> | <a href="#">Privacy Policy</a> | <a href="#">Cookie Policy</a>
            <br><br>
            © 2025, LYNQ Corporation Pvt. Ltd. All Rights Reserved.
        </p>
    </footer>
</body>
@endsection