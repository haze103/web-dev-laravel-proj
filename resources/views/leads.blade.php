@extends('layouts.dashboard')

@section('title', 'Leads | LYNQ')

@section('js')
    <script src="{{ asset('js/leads_script.js') }}"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/leads-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/linq_portal_styles.css') }}">
@endsection

@section('main_section')
@section('lead_active')
active
@endsection
    <section class="main-content">
        <div class="headline">
            <h1>Leads</h1>
            <button type="submit" class="add-btn" id="addLeadBtn"><i class="fa-solid fa-plus"></i><i
                    class="fa-thin fa-pipe"></i>Add Lead</button>
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
                            <td>Assigned To</td>
                            <td>Descending</td>
                        </tr>
                        <tr>
                            <td>Stage</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                        </tr>
                        <tr>
                            <td>Closing Date</td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Assigned To</th>
                        <th>Stage</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tr>
                    <td>data</td>
                    <td>data</td>
                    <td>data</td>
                    <td>data</td>
                    <td>data</td>
                    <td>
                        <div class="action-btn-container">
                            <button type="submit" class="edit-btn action-btn edit-lead-btn">Edit</button>
                            <button type="submit" class="delete-btn action-btn">Delete</button>
                        </div>
                    </td>
                </tr>
                <!-- <tbody>
                                <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a
                                                href="#"
                                                class="btn-edit edit-lead-btn"
                                                data-id="{{-- $post->id --}}"
                                                data-name="{{-- $post->name --}}"
                                                data-company="{{-- $post->company --}}"
                                                data-assigned-to="{{-- $post->assigneTo --}}"
                                                data-stage="{{-- $post->stage --}}"
                                                data-status="{{-- $post->status --}}"
                                                data-closing-date="{{-- $post->closingaDate --}}"
                                                data-amount="{{-- $post->amount --}}"
                                                data-created-by="{{-- $post->createdBy ?? 'Unknown' --}}"
                                            >
                                                Edit
                                            </a>

                                            {{-- <form action="{{ route('leads.destroy', $post->id) }}" method="POST" class="d-inline">
                                                <button type="submit" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                </tbody> -->
            </table>
        </div>
    </section>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="sidebar-form" id="sidebarForm">
        <div class="sidebar-header">
            <div class="upper-part">
                <div class="title-container">
                    <h2>Add Lead</h2>
                    <button class="close-sidebar-btn" id="closeSidebarBtn">&times;</button>
                </div>

                <div class="hr-top">
                    <hr style="border: 1px solid #0c0c0c; width: 90%; margin: 20px;">
                </div>
            </div>
            <div class="lower-part">
                <p>Created By</p>
                <p id="current-user" class="current-user">(Current User)</p>
            </div>
        </div>
        <div class="sidebar-body">
            <input type="hidden" id="leadId" name="lead_id">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="companyName">Company Name</label>
                <input type="text" id="companyName" placeholder="Enter Company Name">
            </div>
            <div class="form-group">
                <label for="assignedTo">Assigned To</label>
                <select id="assignedTo">
                    <option value="">Select Sales Rep</option>
                </select>
            </div>
            <div class="form-group">
                <label for="stage">Stage</label>
                <select id="stage">
                    <option value="">Select Stage</option>
                    <option value="new">New</option>
                    <option value="contacted">Contacted</option>
                    <option value="proposal-sent">Proposal Sent</option>
                    <option value="won">Won</option>
                    <option value="lost">Lost</option>
                </select>
            </div>
            <div class="form-group">
                <label for="closingDate">Closing Date</label>
                <input type="date" id="closingDate"> <span class="calendar-icon"></span>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" id="amount" placeholder="0.00">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status">
                    <option value="">Select Status</option>
                    <option value="active">Active</option>
                    <option value="follow-up">Follow-up</option>
                    <option value="cold">Cold</option>
                </select>
            </div>
        </div>
        <div class="sidebar-footer">
            <button class="cancel-btn" id="cancel-sidebar-btn">Cancel</button>
            <button class="save-btn">Save</button>
        </div>
    </div>
@endsection