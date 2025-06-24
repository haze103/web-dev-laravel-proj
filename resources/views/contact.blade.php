@extends('layouts.app')

@section('title', 'CONTACT US | LYNQ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/contact_styles.css') }}">
@endsection

@section('content')
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <div class="logo-name-nav">
                        <h1 class="lyn">LYN</h1><h1 class="q-logo">Q</h1>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('landing_page') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('sign_in') }}">Sign-In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registration') }}">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="header-msg">
            <h1><span class="lyn">LYN</span><span class="q-logo">Q</span></h1>
            <h3>Welcome to LYNQ!</h3>
            <h3>We are here to assist you.</h3>
        </div>
    </header>
    <main>
        <div class="contact-info">
            <h1>Our Global Toll-free Numbers</h1>
            <table class="contact-number">
                <tr>
                    <td>USA  +1 8334200991</td>
                    <td>PH  (02) 8123 4567</td>
                </tr>
                <tr>
                    <td>AUS  +61 1800960837</td>
                    <td>+63 9221213409</td>
                </tr>
            </table>
            <div id="gmap-loc">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d965.4591284485732!2d121.05266366960836!3d14.551339899120583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c8f3abe7b333%3A0xe4c75f876665f8c8!2sBGC%20Corporate%20Center%2C%2030th%20Street%20corner%2011th%20Avenue%2C%2030th%20St%2C%20Taguig%2C%20Kalakhang%20Maynila!5e0!3m2!1sen!2sph!4v1750500722578!5m2!1sen!2sph" 
                width="100%" height="400" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <h6>Satellite Company: 30th Street corner 11th Avenue, 30th St, Taguig, Kalakhang Maynila</h6>
        </div>
        <div class="contact-lynq">
            <div class="contact-card-new">
                <h3>New to LYNQ?</h3>
                <p>
                    Sales Inquiries<br>
                    <a href="mailto:sales@lynq.com">sales@lynq.com</a><br><br>
                    Want a Personalized Demo?<br>
                    <a href="mailto:sales@lynq.com">Request a Demo</a>
                </p>
            </div>
            <div class="contact-card-existing">
                <h3>Existing Customer?</h3>
                <p>
                    General Support Inquiries<br>
                    <a href="mailto:support@lynq.com">support@lynq.com</a><br><br>
                    Looking to speak to a live agent?<br>
                    <span style="color: #859f3d; font-weight: bold;">Call us on toll-free numbers</span>
                </p>
            </div>
            <div class="contact-card-partner">
                <h3>Looking to Partner with us?</h3>
                <p>
                    Got an interesting proposal?<br><br>
                    Looking for more ways to collaborate?<br>
                    Drop us a note at <a href="mailto:sales@lynq.com">sales@lynq.com</a> and we'll get in touch.
                </p>
            </div>
        </div>
    </main>
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
