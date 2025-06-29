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

            @unlessrole('Sales Representative')
                <button type="submit" class="add-btn" id="addLeadBtn">
                    <i class="fa-solid fa-plus"></i><i class="fa-thin fa-pipe"></i>Add Lead
                </button>
            @endunlessrole

            {{-- <div class="filter-items-container">
                <i class="fa-regular fa-sliders" onclick="openDropDown(); event.stopPropagation();"></i>
                <div class="filter-dropdown-menu">
                    <table class="filter-dropdown-menu-item">
                        <tr><th>Sort By:</th></tr>
                        <tr><td>Company Name</td><td>Ascending</td></tr>
                        <tr><td>Assigned To</td><td>Descending</td></tr>
                        <tr><td>Stage</td></tr>
                        <tr><td>Status</td></tr>
                        <tr><td>Closing Date</td></tr>
                        <tr><td>Amount</td></tr>
                    </table>
                </div>
            </div> --}}
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Assigned To</th>
                        <th>Created By</th>
                        <th>Stage</th>
                        <th>Status</th>
                        <th>Closing Date</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>

                @forelse ($leads as $lead)
                    <tr>
                        <td>{{ $lead->name }}</td>
                        <td>{{ $lead->company }}</td>
                        <td>{{ $lead->assigned_to_first_name . " " . $lead->assigned_to_last_name }}</td>
                        <td>{{ $lead->created_by_first_name . " " . $lead->created_by_last_name }}</td>
                        <td>{{ $lead->stage }}</td>
                        <td>{{ $lead->status }}</td>
                        <td>{{ $lead->closing_date }}</td>
                        <td>{{ $lead->amount }}</td>
                        <td>
                            @unlessrole('Sales Representative')
                                <div class="action-btn-container">
                                    <button type="submit" class="edit-btn action-btn edit-lead-btn"
                                        onclick="window.location.href = '{{ route('lead.edit', ['lead' => $lead]) }}'">Edit</button>
                                    <form action="{{ route('lead.destroy', ['lead' => $lead]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="delete-btn action-btn">Delete</button>
                                    </form>
                                </div>
                            @endunlessrole
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" style="text-align: center;">No leads</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </section>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    {{-- ADD FORM - HIDDEN FOR SALES REP --}}
    @unlessrole('Sales Representative')
    <form method="POST" action="{{ route('lead.store') }}" class="sidebar-form" id="sidebarAddForm">
        @csrf
        @method('post')
        <div class="sidebar-header">
            <div class="upper-part">
                <div class="title-container">
                    <h2>Add Lead</h2>
                    <button class="close-sidebar-btn" type="button" id="closeSidebarBtn">&times;</button>
                </div>
                <div class="hr-top">
                    <hr style="border: 1px solid #0c0c0c; width: 90%; margin: 20px;">
                </div>
            </div>
            <div class="lower-part">
                <p>Created By</p>
                <p id="current-user" class="current-user">{{ auth()->user()->first_name . " " . auth()->user()->last_name }}</p>
                <input type="hidden" name="created_by" value="{{ auth()->id() }}">
            </div>
        </div>
        <div class="sidebar-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
                <label for="companyName">Company Name</label>
                <input type="text" name="company" id="companyName" placeholder="Enter Company Name" required>
            </div>
            <div class="form-group">
                <label for="assignedTo">Assigned To</label>
                <select id="assignedTo" name="assigned_to" required>
                    <option value="">Select Sales Rep</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="stage">Stage</label>
                <select id="stage" name="stage" required>
                    <option value="">Select Stage</option>
                    <option value="new">New</option>
                    <option value="contacted">Contacted</option>
                    <option value="proposal sent">Proposal Sent</option>
                    <option value="won">Won</option>
                    <option value="lost">Lost</option>
                </select>
            </div>
            <div class="form-group">
                <label for="closingDate">Closing Date</label>
                <input type="date" id="closingDate" name="closing_date" required>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" step="0.01" max="9999999999999999.99" id="amount" placeholder="0.00" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="">Select Status</option>
                    <option value="active">Active</option>
                    <option value="follow-up">Follow-up</option>
                    <option value="cold">Cold</option>
                </select>
            </div>
        </div>
        <div class="sidebar-footer">
            <button type="button" class="cancel-btn" id="cancel-sidebar-btn">Cancel</button>
            <button type="submit" class="save-btn">Save</button>
        </div>
    </form>
    @endunlessrole

    {{-- EDIT FORM - HIDDEN FOR SALES REP --}}
    @unlessrole('Sales Representative')
    <form method="POST" action="" class="sidebar-form" id="sidebarUpdateForm">
        @csrf
        @method('put')
        <div class="sidebar-header">
            <div class="upper-part">
                <div class="title-container">
                    <h2>Edit Lead</h2>
                    <button class="close-sidebar-btn" type="button" id="closeSidebarBtn">&times;</button>
                </div>
                <div class="hr-top">
                    <hr style="border: 1px solid #0c0c0c; width: 90%; margin: 20px;">
                </div>
            </div>
            <div class="lower-part">
                <p>Created By</p>
                <p id="current-user" class="current-user">{{ auth()->user()->first_name . " " . auth()->user()->last_name }}</p>
                <input type="hidden" name="created_by" value="{{ auth()->id() }}">
            </div>
        </div>
        <div class="sidebar-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
                <label for="companyName">Company Name</label>
                <input type="text" name="company" id="companyName" placeholder="Enter Company Name" required>
            </div>
            <div class="form-group">
                <label for="assignedTo">Assigned To</label>
                <select id="assignedTo">
                    <option value="">Select Sales Rep</option>
                </select>
            </div>
            <div class="form-group">
                <label for="stage">Stage</label>
                <select id="stage" name="stage" required>
                    <option value="">Select Stage</option>
                    <option value="new">New</option>
                    <option value="contacted">Contacted</option>
                    <option value="proposal sent">Proposal Sent</option>
                    <option value="won">Won</option>
                    <option value="lost">Lost</option>
                </select>
            </div>
            <div class="form-group">
                <label for="closingDate">Closing Date</label>
                <input type="date" id="closingDate" name="closing_date" required>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" step="0.01" max="9999999999999999.99" id="amount" placeholder="0.00" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="">Select Status</option>
                    <option value="active">Active</option>
                    <option value="follow-up">Follow-up</option>
                    <option value="cold">Cold</option>
                </select>
            </div>
        </div>
        <div class="sidebar-footer">
            <button type="button" class="cancel-btn" id="cancel-sidebar-btn">Cancel</button>
            <button type="submit" class="save-btn update-btn">Update</button>
        </div>
    </form>
    @endunlessrole
@endsection
