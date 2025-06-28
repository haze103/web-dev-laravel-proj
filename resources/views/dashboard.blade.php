@extends('layouts.dashboard')

@section('title', 'ADMIN - DASHBOARD | LYNQ')

@section('js')
    <script src="{{ asset('js/landingPage.js') }}"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/db-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/linq_portal_styles.css') }}">
@endsection

@section('main_section')
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
@endsection