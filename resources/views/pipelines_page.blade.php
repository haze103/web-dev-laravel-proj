@extends('layouts.dashboard')

@section('title', 'PIPELINES | LYNQ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/linq_portal_styles.css') }}">
@endsection

@section('main_section')
@section('pipeline_active')
active
@endsection
    <section class="main-content">
        <div class="headline">
            <h1>Pipelines</h1>
            <div class="filter-items-container">
                <i class="fa-regular fa-sliders" onclick="openDropDown(); event.stopPropagation();"></i>
                <div class="filter-dropdown-menu">
                    <table class="filter-dropdown-menu-item">
                        <tr>
                            <th>Sort By:</th>
                        </tr>
                        <tr>
                            <td>Company Name</td>
                            <td>Ascending</td>
                        </tr>
                        <tr>
                            <td>Contact Name</td>
                            <td>Descending</td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                        </tr>
                        <tr>
                            <td>Closing Date</td>
                        </tr>
                        <tr>
                            <td>Created By</td>
                        </tr>
                        <tr>
                            <td>Date Created</td>
                        </tr>
                        <tr>
                            <td>Assigned To</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="pipelines-table">
            <div class="pipelines-new">
                <h2>New</h2>
                <table class="pipelines-table-data" id="pipelines-new-data">
                    <tr>
                        <td>data</td>
                    </tr>
                    <tr>
                        <td>data</td>
                    </tr>
                </table>
            </div>
            <div class="pipelines-contacted">
                <h2>Contacted</h2>
                <table class="pipelines-table-data" id="pipelines-contacted-data">
                    <tr>
                        <td>data</td>
                    </tr>
                    <tr>
                        <td>data</td>
                    </tr>
                </table>
            </div>
            <div class="pipelines-proposal-sent">
                <h2>Proposal Sent</h2>
                <table class="pipelines-table-data" id="pipelines-proposal-data">
                    <tr>
                        <td>data</td>
                    </tr>
                    <tr>
                        <td>data</td>
                    </tr>
                </table>
            </div>
            <div class="pipelines-won">
                <h2>Won</h2>
                <table class="pipelines-table-data" id="pipelines-won-data">
                    <tr>
                        <td>data</td>
                    </tr>
                    <tr>
                        <td>data</td>
                    </tr>
                </table>
            </div>
            <div class="pipelines-lost">
                <h2>Lost</h2>
                <table class="pipelines-table-data" id="pipelines-lost-data">
                    <tr>
                        <td>data</td>
                    </tr>
                    <tr>
                        <td>data</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
@endsection