@extends('layouts.dashboard')

@section('title', 'ADMIN - USERS | LYNQ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/linq_portal_styles.css') }}">
@endsection

@section('user_active', 'active') {{-- Correct placement --}}

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelector('.edit-btn').click();
        })
    </script>
@endsection

@section('main_section')
    <section class="main-content">
        <div class="headline">
            <h1>Users</h1>

            {{-- Show Add User button only if user has Admin or Super Admin role --}}
            @hasanyrole('Admin|Super Admin')
            <button type="button" class="add-btn">
                <i class="fa-solid fa-plus"></i><i class="fa-thin fa-pipe"></i>Add User
            </button>
            @endhasanyrole

            {{-- <div class="filter-items-container">
                <i class="fa-regular fa-sliders" onclick="openDropDown(); event.stopPropagation();"></i>
                <div class="filter-dropdown-menu">
                    <table class="filter-dropdown-menu-item">
                        <tr>
                            <th>Sort By:</th>
                        </tr>
                        <tr>
                            <td>Admin</td>
                            <td>Ascending</td>
                        </tr>
                        <tr>
                            <td>Sales Manager</td>
                            <td>Descending</td>
                        </tr>
                        <tr>
                            <td>Sales Representative</td>
                        </tr>
                        <tr>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td>Inactive</td>
                        </tr>
                        <tr>
                            <td>Pending Accounts</td>
                        </tr>
                    </table>
                </div>
            </div> --}}
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
                @isset ($user)
                    <tr>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->status }}</td>
                        <td>
                            {{-- Only Admin or Super Admin can see Edit/Delete --}}
                            @hasanyrole('Admin|Super Admin')
                            <div class="action-btn-container">
                                <button type="button" class="edit-btn action-btn">Edit</button>
                                <form action="{{ route('admin.users.destroy', ['user' => $user]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="delete-btn action-btn">Delete</button>
                                </form>

                            </div>
                            @endhasanyrole
                        </td>
                    </tr>
                @endisset
            </table>
        </div>

        <div class="cover-main-content"></div>

        {{-- Show Add User form only for Admin or Super Admin --}}
        @hasanyrole('Admin|Super Admin')
        <div class="side-panel-container">
            <h1 class="add-h1-side-panel">Add User</h1>
            <hr>

            {{-- Success & Error Handling --}}
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
                        <input type="text" id="admin-user-first-name" name="first_name" class="side-panel-input-field"
                            required value="{{ $user->first_name }}">
                    </div>

                    <div class="user-input">
                        <label for="admin-user-last-name">Last Name</label>
                        <input type="text" id="admin-user-last-name" name="last_name" class="side-panel-input-field"
                            required value="{{ $user->last_name }}">
                    </div>

                    <div class="user-input">
                        <label for="admin-user-email">Email</label>
                        <input type="email" name="email" class="side-panel-input-field" required value="{{ $user->email }}">
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
                            <option value="Admin" {{ old('role', $user->role) === 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Sales Manager" {{ old('role', $user->role) === 'Sales Manager' ? 'selected' : '' }}>Sales Manager</option>
                            <option value="Sales Representative" {{ old('role', $user->role) === 'Sales Representative' ? 'selected' : '' }}>Sales Representative</option>                            
                        </select>
                    </div>

                    <div class="user-input">
                        <label for="admin-user-status">Status</label>
                        <select name="status" class="side-panel-input-field" required>
                            <option value="" disabled selected hidden>Select Status</option>
                            <option value="Active" {{ old('role', $user->status) === 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('role', $user->status) === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="Pending Accounts" {{ old('role', $user->status) === 'Pending Accounts' ? 'selected' : '' }}>Pending Accounts</option>
                        </select>
                    </div>

                    <div class="side-panel-btns">
                        <button type="button" class="cancel-btn"
                            onclick="location.replace('{{ route('admin_access_user') }}')">Cancel</button>
                        <button type="submit" class="save-btn">Update</button>
                    </div>
                </div>
            </form>
        </div>
        @endhasanyrole
    </section>
@endsection