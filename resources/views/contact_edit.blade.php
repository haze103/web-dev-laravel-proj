@extends('layouts.dashboard')

@section('title', 'CONTACTS | LYNQ')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/linq_portal_styles.css') }}">
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelector('.edit-btn').click();
    })
</script>
@endsection

@section('main_section')
@section('contact_active')
active
@endsection
<section class="main-content">
    <div class="headline">
        <h1>Contacts</h1>
        <button type="button" class="add-btn"><i class="fa-solid fa-plus"></i><i class="fa-thin fa-pipe"></i>Add
            Contact</button>
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
                        <td>Assigned Lead</td>
                        <td>Descending</td>
                    </tr>
                    <tr>
                        <td>Position</td>
                    </tr>
                    <tr>
                        <td>Created Date</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="details-data-table">
        <table class="contacts-table-data data-table">
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company</th>
                <th>Position</th>
                <th>Assigned Sales Representative</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
            @isset ($contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->phone_number }}</td>
                <td>{{ $contact->company }}</td>
                <td>{{ $contact->position }}</td>
                <td>{{ $contact->assigned_to_first_name }} {{ $contact->assigned_to_last_name }}</td>
                <td>{{ $contact->created_by_first_name }} {{ $contact->created_by_last_name }}</td>
                <td>
                    <div class="action-btn-container">
                        <button type="button" class="edit-btn action-btn">Edit</button>
                        <button type="button" class="delete-btn action-btn">Delete</button>
                    </div>
                </td>
            </tr>
            @endisset
        </table>
    </div>
    <div class="cover-main-content"></div>
    <form method="post" action="{{ route('contact.update', ['contact' => $contact]) }}" class="side-panel-container">
        @csrf
        @method('put')
        <h1 class="add-h1-side-panel">Edit Contact</h1>
        <hr>
        <div class="side-panel-form">

            <div class="curr-user-container">
                <label for="curr-user">Created By</label>
                <p id="curr-user">
                    {{ $data->created_by_first_name . " " . $data->created_by_last_name }}
                </p>
            </div>
            <div class="user-input">
                <label for="contact-name">Full Name</label>
                <input type="text" id="contact-name" class="side-panel-input-field" name="name" required value="{{ $data->name }}">
            </div>
            <div class="user-input">
                <label for="contact-email">Email</label>
                <input type="email" id="contact-email" class="side-panel-input-field" required name="email" value="{{ $data->email }}">
            </div>
            <div class="user-input">
                <label for="contact-phone">Phone</label>
                <input type="tel" id="contact-phone" class="side-panel-input-field" required name="phone_number" value="{{ $data->phone_number }}" minlength="10" maxlength="15" pattern="[0-9]{10,15}">
            </div>
            <div class="user-input">
                <label for="contact-company-name">Company</label>
                <input type="text" id="contact-company-name" class="side-panel-input-field" required name="company" value="{{ $data->company }}">
            </div>
            <div class="user-input">
                <label for="contact-position">Position</label>
                <input type="text" id="contact-position" class="side-panel-input-field" required name="position" value="{{ $data->position }}">
            </div>
            <div class="user-input">
                <label for="assigned-lead-dropdown">Assigned Lead</label>
                <select id="assigned-lead-dropdown" name="sales_representative_id" class="side-panel-input-field"
                    required>
                    <option value="">Select Sales Rep</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $contact->sales_representative_id == $user->id ? 'selected' : '' }}>
                            {{ $user->first_name }} {{ $user->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="side-panel-btns">
                <button type="button" class="cancel-btn" onclick="location.replace('{{ route('contact_page') }}')">Cancel</button>
                <button type="submit" class="save-btn edit-btn">Update</button>
            </div>
        </div>
    </form>
</section>
@endsection