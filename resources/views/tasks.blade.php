@extends('layouts.dashboard')

@section('title', 'TASKS | LYNQ')

@section('js')
    <script src="{{ asset('js/tasks_script.js') }}"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/tasks_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/linq_portal_styles.css') }}">
@endsection

@section('main_section')
@section('task_active')
active
@endsection
    <section class="main-content">
        <div class="headline">
            <h1>Task</h1>
            <button type="submit" class="add-btn" id="addTaskBtn"><i class="fa-solid fa-plus"></i><i
                    class="fa-thin fa-pipe"></i>Add Task</button>
            <div class="filter-items-container">
                <i class="fa-regular fa-sliders" onclick="openDropDown(); event.stopPropagation();"></i>
                <div class="filter-dropdown-menu task-dropdown">
                    <table class="filter-dropdown-menu-item">
                        <tr>
                            <th>Sort By:</th>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>Ascending</td>
                        </tr>
                        <tr>
                            <td>Due Date</td>
                            <td>Descending</td>
                        </tr>
                        <tr>
                            <td>Priority</td>
                        </tr>
                        <tr>
                            <td>Created Date</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Checkbox</th>
                        <th>Title</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Linked Lead</th>
                        <th>Priority</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width: 5%;">
                            <input type="checkbox" class="task-done-checkbox" data-task-id="task-123">
                            <label for="task-done-checkbox-task-123" class="visually-hidden">Mark task as done</label>
                        </td>
                        <td style="width: 15%;">{{-- $post->title --}}</td>
                        <td style="width: 15%;">{{-- $post->due_date --}}</td>
                        <td style="width: 15%;">{{-- $post->status --}}</td>
                        <td style="width: 15%;">{{-- $post->linked_lead_name --}}</td>
                        <td style="width: 10%;">{{-- $post->priority --}}</td>
                        <td style="width: 15%;">
                            <div class="action-btn-container">
                                <a href="sidebarForm" class="btn-edit edit-task-btn action-btn"
                                    data-id="{{-- $post->id --}}" data-title="{{-- $post->title --}}"
                                    data-due-date="{{-- $post->due_date --}}" data-status="{{-- $post->status --}}"
                                    data-linked-lead="{{-- $post->linked_lead_id --}}"
                                    data-priority="{{-- $post->priority --}}"
                                    data-created-by="{{-- $post->createdBy ?? 'Unknown' --}}"
                                    data-is-completed="{{-- $post->is_completed ? 'true' : 'false' --}}">
                                    Edit
                                </a>
                                <button type="submit" class="delete-btn action-btn">Delete</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="sidebar-form" id="sidebarForm">
        <div class="sidebar-header">
            <div class="upper-part">
                <div class="title-container">
                    <h2>Add Task</h2>
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
            <input type="hidden" id="taskId" name="task_id">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" placeholder="Enter Task Title">
            </div>
            <div class="form-group">
                <label for="dueDate">Due Date</label>
                <input type="date" id="dueDate"> <span class="calendar-icon"></span>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status">
                    <option value="">Select Stage</option>
                    <option value="Pending">Pending</option>
                    <option value="In-Progress">In Progress</option>
                    <option value="Done">Done</option>
                </select>
            </div>
            <div class="form-group">
                <label for="linkedLead">Linked Lead</label>
                <select id="linkedLead">
                    <option value="">Select Sales Rep</option>
                </select>
            </div>
            <div class="form-group">
                <label for="priority">Priority</label>
                <select id="priority">
                    <option value="">Select Stage</option>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
            </div>
        </div>
        <div class="sidebar-footer">
            <button class="cancel-btn" id="cancel-sidebar-btn">Cancel</button>
            <button class="save-btn">Save</button>
        </div>
    </div>
@endsection