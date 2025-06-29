@extends('layouts.dashboard')

@section('title', 'ADMIN - USERS | LYNQ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/linq_portal_styles.css') }}">
@endsection

@section('main_section')
@section('user_active')
active
@endsection
<section class="main-content">
    <div class="headline">
        <h1>Users</h1>

        @if (auth()->user()->role !== 'Sales Representative')
            <button type="button" class="add-btn">
                <i class="fa-solid fa-plus"></i><i class="fa-thin fa-pipe"></i>Add User
            </button>
        @endif

        <div class="filter-items-container">
            <i class="fa-regular fa-sliders" onclick="openDropDown(); event.stopPropagation();"></i>
            <div class="filter-dropdown-menu">
                <table class="filter-dropdown-menu-item">
                    <tr><th>Sort By:</th></tr>
                    <tr><td>Admin</td><td>Ascending</td></tr>
                    <tr><td>Sales Manager</td><td>Descending</td></tr>
                    <tr><td>Sales Representative</td></tr>
                    <tr><td>Active</td></tr>
                    <tr><td>Inactive</td></tr>
                    <tr><td>Pending Accounts</td></tr>
                </table>
            </div>
        </div>
    </div>

    <div class="details-data-table">
        <table class="users-table-data data-table">
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->status }}</td>
                    <td>
                        @if (auth()->user()->role !== 'Sales Representative')
                            <div class="action-btn-container">
                                <button type="button" class="edit-btn action-btn">Edit</button>
                                <button type="button" class="delete-btn action-btn">Delete</button>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="cover-main-content"></div>

    @if (auth()->user()->role !== 'Sales Representative')
        <div class="side-panel-container">
            <h1 class="add-h1-side-panel">Add User</h1>
            <h1 class="edit-h1-side-panel">Edit User</h1>
            <hr>

            {{-- ✅ Success & Error Handling --}}
            @if (session('success'))
                <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
            @endif

            @if ($errors->any())
                <ul style="color: red;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="side-panel-form">
                    <div class="curr-user-container">
                        <label for="curr-user">Created By</label>
                        <input type="text" id="curr-user"
                               value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}" disabled>
                    </div>

                    <div class="user-input">
                        <label for="admin-user-first-name">First Name</label>
                        <input type="text" id="admin-user-first-name" name="first_name"
                               class="side-panel-input-field" required>
                    </div>

                    <div class="user-input">
                        <label for="admin-user-last-name">Last Name</label>
                        <input type="text" id="admin-user-last-name" name="last_name"
                               class="side-panel-input-field" required>
                    </div>

                    <div class="user-input">
                        <label for="admin-user-email">Email</label>
                        <input type="email" name="email" class="side-panel-input-field" required>
                    </div>

                    <div class="user-input">
                        <label for="admin-user-password">Password</label>
                        <input type="password" name="password" class="side-panel-input-field" required>
                    </div>

                    <div class="user-input">
                        <label for="admin-user-password-confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="side-panel-input-field" required>
                    </div>

                    <div class="user-input">
                        <label for="admin-user-role">Role</label>
                        <select name="role" class="side-panel-input-field" required>
                            <option value="" disabled selected hidden>Select Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Sales Manager">Sales Manager</option>
                            <option value="Sales Representative">Sales Representative</option>
                        </select>
                    </div>

                    <div class="user-input">
                        <label for="admin-user-status">Status</label>
                        <select name="status" class="side-panel-input-field" required>
                            <option value="" disabled selected hidden>Select Status</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Pending Accounts">Pending Accounts</option>
                        </select>
                    </div>

                    <div class="side-panel-btns">
                        <button type="button" class="cancel-btn">Cancel</button>
                        <button type="submit" class="save-btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
    @endif
</section>
@endsection
