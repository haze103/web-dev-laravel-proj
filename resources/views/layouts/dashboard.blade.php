@extends('layouts.app')

@section('content')
<body>
    <header>
        <div class="header-nav">
            <h1><span class="lyn">LYN</span><span class="q-logo">Q</span></h1>
            <div class="search-input">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" id="search-data">
            </div>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                @method('post')
                <button type="submit" class="logout-btn">Logout</a>
            </form>
        </div>
    </header>
    <main>
        <aside>
            <nav class="sidebar-nav">
                <ul class="sidebar-contents">
                    <li class="sidebar-item @yield('dashboard_active')">
                        <i class="fa-duotone fa-solid fa-grid-2 fa-rotate-90"></i>
                        <a class="sidebar-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="sidebar-item @yield('pipeline_active')">
                        <i class="fa-regular fa-filter"></i>
                        <a class="sidebar-link" href="{{ route('pipelines_page') }}">Pipelines</a>
                    </li>
                    <li class="sidebar-item @yield('lead_active')">
                        <i class="fa-regular fa-chart-user"></i>
                        <a class="sidebar-link" href="{{ route('leads') }}">Leads</a>
                    </li>
                    <li class="sidebar-item @yield('contact_active')">
                        <i class="fa-duotone fa-solid fa-users"></i>
                        <a class="sidebar-link" href="{{ route('contact_page') }}">Contacts</a>
                    </li>
                    <li class="sidebar-item @yield('task_active')">
                        <i class="fa-regular fa-list-check"></i>
                        <a class="sidebar-link" href="{{ route('tasks') }}">Task</a>
                    </li>
                    <li class="sidebar-item @yield('user_active')">
                        <i class="fa-regular fa-user"></i>
                        <a class="sidebar-link" href="{{ route('admin_access_user') }}">Users</a>
                    </li>
                </ul>
            </nav>
        </aside>
        @yield('main_section')
    </main>
</body>
@endsection