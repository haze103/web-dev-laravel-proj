@extends('layouts.dashboard')

@section('title', 'ADMIN - DASHBOARD | LYNQ')

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/landingPage.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('leadsPieChart').getContext('2d');

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Won', 'Lost', 'Ongoing'],
                    datasets: [{
                        label: 'Lead Status Distribution',
                        data: [{{ $leads_won }}, {{ $leads_lost }}, {{ $leads_ongoing }}],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.7)',   // Won
                            'rgba(255, 99, 132, 0.7)',   // Lost
                            'rgba(255, 206, 86, 0.7)'    // Ongoing
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });

            const ctx2 = document.getElementById('assignedLeadsChart').getContext('2d');

            const assignedLeadsChart = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($assigned_leads->map(fn($lead) => $lead->first_name . ' ' . $lead->last_name)) !!},
                    datasets: [{
                        label: 'Assigned Leads',
                        data: {!! json_encode($assigned_leads->pluck('count')) !!},
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y', // This makes the bar chart horizontal
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Number of Leads'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Assignees'
                            }
                        }
                    }
                }
            });


            const conversionData = @json($conversion);

            const monthNames = {
                '1': 'Jan', '2': 'Feb', '3': 'Mar', '4': 'Apr',
                '5': 'May', '6': 'Jun', '7': 'Jul', '8': 'Aug',
                '9': 'Sep', '10': 'Oct', '11': 'Nov', '12': 'Dec'
            };

            const labels = conversionData.map(item => monthNames[item.month]);
            const counts = conversionData.map(item => item.count);

            const ctx3 = document.getElementById('leadsWonChart').getContext('2d');
            new Chart(ctx3, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Leads Won',
                        data: counts,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Number of Leads Won'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/db-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/linq_portal_styles.css') }}">
@endsection

@section('main_section')
    @section('dashboard_active')
        active
    @endsection
    <section class="main-content">
        <div class="content">
            <h1>DASHBOARD</h1>
            <div class="lower-part">
                <div class="side-cards">
                    <div class="cards">
                        <h2>Total Leads</h2>
                        <p class="total-leads">{{ $total_leads }}</p>
                    </div>
                    <div class="cards">
                        <h2>Leads Won</h2>
                        <p class="leads-won">{{ $leads_won }}</p>
                    </div>
                    <div class="cards">
                        <h2>Leads Lost</h2>
                        <p class="leads-lost">{{ $leads_lost }}</p>
                    </div>
                    <div class="cards">
                        <h2>Ongoing Leads</h2>
                        <p class="ongoing-leads">{{ $leads_ongoing }}</p>
                    </div>
                </div>

                <div class="right-charts">
                    <div class="charts">
                        <h2>Total Leads</h2>
                        <div class="pie-chart">
                            <canvas id="leadsPieChart"></canvas>
                        </div>
                    </div>
                    <div class="charts">
                        <h2>Conversion Rate</h2>
                        <div class="conversion-graph">
                            <canvas id="leadsWonChart"></canvas>
                        </div>
                    </div>
                    <div class="charts">
                        <h2>Assigned Leads</h2>
                        <canvas id="assignedLeadsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection