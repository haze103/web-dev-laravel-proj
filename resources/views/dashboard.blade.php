@extends('layouts.app')

@section('title', 'ADMIN - DASHBOARD | LYNQ')

@section('js')
    <script src="{{ asset('js/landingPage.js') }}"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/db-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/linq_portal_styles.css') }}">
@endsection

@section('content')
<body>
    <header>
        <div class="header-nav">
            <h1><span class="lyn">LYN</span><span class="q-logo">Q</span></h1>
            <a href="{{ route('sign_in') }}" class="logout-btn">Logout</a>
        </div>
    </header>
    <main>
        <aside>
            <nav class="sidebar-nav">
                <ul class="sidebar-contents">
                    <li class="sidebar-item active">
                        <i class="fa-duotone fa-solid fa-grid-2 fa-rotate-90"></i>
                        <a class="sidebar-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="sidebar-item">
                        <i class="fa-regular fa-filter"></i>
                        <a class="sidebar-link" href="{{ route('pipelines_page') }}">Pipelines</a>
                    </li>
                    <li class="sidebar-item">
                        <i class="fa-regular fa-chart-user"></i>
                        <a class="sidebar-link" href="{{ route('leads') }}">Leads</a>
                    </li>
                    <li class="sidebar-item">
                        <i class="fa-duotone fa-solid fa-users"></i>
                        <a class="sidebar-link" href="{{ route('contact_page') }}">Contacts</a>
                    </li>
                    <li class="sidebar-item">
                        <i class="fa-regular fa-list-check"></i>
                        <a class="sidebar-link" href="{{ route('tasks') }}">Task</a>
                    </li>
                    <li class="sidebar-item">
                        <i class="fa-regular fa-user"></i>
                        <a class="sidebar-link" href="{{ route('admin_access_user') }}">Users</a>
                    </li>
                </ul>
            </nav>
        </aside>
        <section class="main-content">
            <div class="content">
                <h1>DASHBOARD</h1>
                <div class="lower-part">
                    <div class="side-cards">
                        <div class="cards">
                            <h2>Total Leads</h2>
                            <p class="total-leads">0</p>
                        </div>
                        <div class="cards">
                            <h2>Leads Won</h2>
                            <p class="leads-won">0</p>
                        </div>
                        <div class="cards">
                            <h2>Leads Lost</h2>
                            <p class="leads-lost">0</p>
                        </div>
                        <div class="cards">
                            <h2>Ongoing Leads</h2>
                            <p class="ongoing-leads">0</p>
                        </div>
                    </div>

                    <div class="right-charts">
                        <div class="charts">
                            <h2>Total Leads</h2>
                            <div class="pie-chart">
                            </div>
                        </div>
                        <div class="charts">
                            <h2>Conversion Rate</h2>
                            <div class="conversion-graph">
                            </div>
                        </div>
                        <div class="charts">
                            <h2>Assigned Leads</h2>
                            <div class="a-leads-graph">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
@endsection
