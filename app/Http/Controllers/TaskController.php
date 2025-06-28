<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Validation\Rule;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required'],
            'due_date' => ['required', 'date'],
            'status' => ['required', Rule::in(['pending', 'in progress', 'done'])],
            'sales_representative_id' => ['required', 'integer', 'exists:users,id']
        ]);

        Task::create($data);

        return redirect('tasks');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $data = Task::where('tasks.id', $task->id)
        ->leftJoin('users as assignee', 'assignee.id', '=', 'tasks.sales_representative_id')
        ->select()
        ->first();

        $users = User::all();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title' => ['required'],
            'due_date' => ['required', 'date'],
            'status' => ['required', Rule::in(['pending', 'in progress', 'done'])],
            'sales_representative_id' => ['required', 'integer', 'exists:users,id']
        ]);

        $task->update($data);

        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('tasks');
    }
}
