@extends('layouts.app')

@section('title', 'CONTACTS | LYNQ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/linq_portal_styles.css') }}">
@endsection

@section('content')
<body>
    <header>
        <div class="header-nav">
            <h1><span class="lyn">LYN</span><span class="q-logo">Q</span></h1>
            <div class="search-input">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" id="search-data">
            </div>
            <a href="{{ route('sign_in') }}" class="logout-btn">Logout</a>
        </div>
    </header>
    <main>
        <aside>
            <nav class="sidebar-nav">
                <ul class="sidebar-contents">
                    <li class="sidebar-item">
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
                    <li class="sidebar-item active">
                        <i class="fa-duotone fa-solid fa-users"></i>
                        <a class="sidebar-link" href="{{ route('contact_page') }}">Contacts</a>
                    </li>
                    <li class="sidebar-item">
                        <i class="fa-regular fa-list-check"></i>
                        <a class="sidebar-link" href="{{ route('tasks') }}">Task</a>
                    </li>
                </ul>
            </nav>
        </aside>
        <section class="main-content">
            <div class="headline">
                <h1>Contacts</h1>
                <button type="submit" class="add-btn"><i class="fa-solid fa-plus"></i><i class="fa-thin fa-pipe"></i>Add Contact</button>
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
                        <th>Assigned Lead</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>data</td>
                        <td>data</td>
                        <td>data</td>
                        <td>data</td>
                        <td>data</td>
                        <td>data</td>
                        <td>
                            <div class="action-btn-container">
                                <button type="submit" class="edit-btn action-btn">Edit</button>
                                <button type="submit" class="delete-btn action-btn">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>data</td>
                        <td>data</td>
                        <td>data</td>
                        <td>data</td>
                        <td>data</td>
                        <td>data</td>
                        <td>
                            <div class="action-btn-container">
                                <button type="submit" class="edit-btn action-btn">Edit</button>
                                <button type="submit" class="delete-btn action-btn">Delete</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="cover-main-content"></div>
            <div class="side-panel-container">
                <h1 class="add-h1-side-panel">Add Contact</h1>
                <h1 class="edit-h1-side-panel">Edit Contact</h1>
                <hr>
                <div class="side-panel-form">
                    <div class="curr-user-container">
                        <label for="curr-user">Created By</label>
                        <input type="text" id="curr-user" placeholder="<currrent user>" disabled>
                    </div>
                    <div class="user-input">
                        <label for="contact-name">Full Name</label>
                        <input type="text" id="contact-name" class="side-panel-input-field">
                    </div>
                    <div class="user-input">
                        <label for="contact-email">Email</label>
                        <input type="email" id="contact-email" class="side-panel-input-field">
                    </div>
                    <div class="user-input">
                        <label for="contact-phone">Phone</label>
                        <input type="tel" id="contact-phone" class="side-panel-input-field">
                    </div>
                    <div class="user-input">
                        <label for="contact-company-name">Company</label>
                        <input type="text" id="contact-company-name" class="side-panel-input-field">
                    </div>
                    <div class="user-input">
                        <label for="contact-position">Position</label>
                        <input type="text" id="contact-position" class="side-panel-input-field">
                    </div>
                    <div class="user-input">
                        <label for="assigned-lead-dropdown">Assigned Lead</label>
                        <select id="assigned-lead-dropdown" class="side-panel-input-field">
                            <option value="" disabled selected hidden></option>
                            <option value="">User 1</option>
                            <option value="">User 2</option>
                            <option value="">User 3</option>
                        </select>
                    </div>
                    <div class="side-panel-btns">
                        <button type="submit" class="cancel-btn">Cancel</button>
                        <button type="submit" class="save-btn">Save</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
@endsection