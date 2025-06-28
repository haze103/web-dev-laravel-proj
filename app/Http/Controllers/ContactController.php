<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
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
            "name" => ['required'],
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'digits_between:10,15'],
            'company' => ['required'],
            'position' => ['required'],
            'sales_representative_id' => ['required', 'integer', 'exists:users,id'],
            'created_by' => ['required', 'integer', 'exists:users,id']
        ]);
        $data['created_by'] = auth()->id();
        Contact::create($data);
        return redirect('contact_page');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $lead)
    {
        $data = Contact::leftJoin('users as creator', 'creator.id', '=', 'contacts.created_by')
            ->where('contacts.id', $lead->id)
            ->leftJoin('users as assignee', 'assignee.id', '=', 'contacts.sales_representative_id')
            ->select([
                'contacts.id',
                'creator.first_name as created_by_first_name',
                'creator.last_name as created_by_last_name',
                'assignee.first_name as assigned_to_first_name',
                'assignee.last_name as assigned_to_last_name',
                'contacts.name',
                'contacts.email',
                'contacts.phone_number',
                'contacts.company',
                'contacts.position'
            ])
            ->first();

        $users = User::all();

        return view('lead_edit', ['lead' => $lead, 'data' => $data, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $lead)
    {
        //
    }
}
