@extends('layouts.dashboard')

@section('title', 'TASKS | LYNQ')

@section('js')
    <script src="{{ asset('js/tasks_script.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelector('.edit-task-btn')?.click();
        })
    </script>
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

        {{-- Hide "Add Task" button for Sales Representative --}}
        @if (auth()->user()->role !== 'Sales Representative')
            <button type="submit" class="add-btn" id="addTaskBtn">
                <i class="fa-solid fa-plus"></i><i class="fa-thin fa-pipe"></i>Add Task
            </button>
        @endif

        <div class="filter-items-container">
            <i class="fa-regular fa-sliders" onclick="openDropDown(); event.stopPropagation();"></i>
            <div class="filter-dropdown-menu task-dropdown">
                <table class="filter-dropdown-menu-item">
                    <tr><th>Sort By:</th></tr>
                    <tr><td>Status</td><td>Ascending</td></tr>
                    <tr><td>Due Date</td><td>Descending</td></tr>
                    <tr><td>Priority</td></tr>
                    <tr><td>Created Date</td></tr>
                </table>
            </div>
        </div>
    </div>

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Linked Lead</th>
                    <th>Priority</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @isset ($task)
                    <tr>
                        <td style="width: 15%;">{{ $task->title }}</td>
                        <td style="width: 15%;">{{ $task->due_date }}</td>
                        <td style="width: 15%;">{{ $task->status }}</td>
                        <td style="width: 15%;">{{ $task->assigned_to_first_name }} {{ $task->assigned_to_last_name }}</td>
                        <td style="width: 10%;">{{ $task->priority }}</td>
                        <td style="width: 15%;">
                            {{-- Hide edit/delete for Sales Representative --}}
                            @if (auth()->user()->role !== 'Sales Representative')
                                <div class="action-btn-container">
                                    <button class="btn-edit edit-task-btn action-btn">Edit</button>
                                    <button type="submit" class="delete-btn action-btn">Delete</button>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endisset
            </tbody>
        </table>
    </div>
</section>

{{-- Hide sidebar form for Sales Representative --}}
@if (auth()->user()->role !== 'Sales Representative')
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <form class="sidebar-form" id="sidebarForm" method="post" action="{{ route('task.store') }}">
        @csrf
        @method('post')
        <div class="sidebar-header">
            <div class="upper-part">
                <div class="title-container">
                    <h2>Edit Task</h2>
                    <button class="close-sidebar-btn" id="closeSidebarBtn"
                        onclick="location.href = '{{ route('tasks') }}'" type="button">&times;</button>
                </div>
                <div class="hr-top">
                    <hr style="border: 1px solid #0c0c0c; width: 90%; margin: 20px;">
                </div>
            </div>
        </div>
        <div class="sidebar-body">
            <input type="hidden" id="taskId" name="task_id">

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" placeholder="Enter Task Title" name="title" required value="{{ $task->title }}">
            </div>

            <div class="form-group">
                <label for="dueDate">Due Date</label>
                <input type="date" id="dueDate" name="due_date" required value="{{ $task->due_date }}">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="">Select Stage</option>
                    <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in progress" {{ old('status', $task->status) == 'in progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="done" {{ old('status', $task->status) == 'done' ? 'selected' : '' }}>Done</option>
                </select>
            </div>

            <div class="form-group">
                <label for="linkedLead">Assigned</label>
                <select id="linkedLead" name="sales_representative_id" required>
                    <option value="">Select Sales Rep</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $task->sales_representative_id == $user->id ? 'selected' : '' }}>
                            {{ $user->first_name }} {{ $user->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="priority">Priority</label>
                <select id="priority" name="priority" required>
                    <option value="">Select Stage</option>
                    <option value="low" {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ old('priority',$task->priority) == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="high" {{ old('priority',$task->priority) == 'high' ? 'selected' : '' }}>High</option>
                </select>
            </div>
        </div>

        <div class="sidebar-footer">
            <button class="cancel-btn" id="cancel-sidebar-btn" type="button"
                onclick="location.href = '{{ route('tasks') }}'">Cancel</button>
            <button class="save-btn update-btn" type="submit">Update</button>
        </div>
    </form>
@endif
@endsection
