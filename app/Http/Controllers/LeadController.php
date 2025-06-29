<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class LeadController extends Controller
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
        $validateForm = $request->validate([
            'name' => ['required'],
            'company' => ['required'],
            'assigned_to' => ['integer', 'exists:users,id'],
            'created_by' => ['required', 'integer', 'exists:users,id'],
            'stage' => ['required', Rule::in(['new', 'contacted', 'proposal sent', 'won', 'lost'])],
            'closing_date' => ['required', 'date'],
            'amount' => ['required', 'decimal:0,2'],
            'status' => ['required', Rule::in(['active', 'follow-up', 'cold'])]
        ]);
        $validateForm['created_by'] = auth()->id();
        Lead::create($validateForm);
        return redirect('leads');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        $data = Lead::leftJoin('users as creator', 'creator.id', '=', 'leads.created_by')
            ->where('leads.id', $lead->id)
            ->leftJoin('users as assignee', 'assignee.id', '=', 'leads.assigned_to')
            ->select([
                'leads.id',
                'creator.first_name as created_by_first_name',
                'creator.last_name as created_by_last_name',
                'assignee.first_name as assigned_to_first_name',
                'assignee.last_name as assigned_to_last_name',
                'leads.name',
                'leads.company',
                'leads.stage',
                'leads.closing_date',
                'leads.amount',
                'leads.status'
            ])
            ->first();

        switch (auth()->user()->role) {
            case 'Super Admin':
                $users = User::all();
                break;
            case 'Admin':
                $users = User::all();
                break;
            case 'Sales Manager':
                $users = User::whereIn('role', ['Sales Representative'])->get();
                break;
            case 'Sales Representative':
                $users = User::whereIn('role', ['Sales Representative'])->get();
                break;
        }

        return view('lead_edit', ['lead' => $lead, 'data' => $data, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        $validateForm = $request->validate([
            'name' => ['required'],
            'company' => ['required'],
            'assigned_to' => ['integer', 'exists:users,id'],
            'stage' => ['required', Rule::in(['new', 'contacted', 'proposal sent', 'won', 'lost'])],
            'closing_date' => ['required', 'date'],
            'amount' => ['required', 'decimal:0,2'],
            'status' => ['required', Rule::in(['active', 'follow-up', 'cold'])]
        ]);

        $lead->update($validateForm);
        return redirect('leads');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect('leads');
    }
}
