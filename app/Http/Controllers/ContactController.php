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
     * Store a newly created contact.
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
        ]);

        $data['created_by'] = auth()->id();

        Contact::create($data);
        return redirect()->route('contact_page')->with('success', 'Contact created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Update the specified contact in storage.
     */

    public function edit(Contact $contact)
    {
        $data = Contact::leftJoin('users as creator', 'creator.id', '=', 'contacts.created_by')
            ->where('contacts.id', $contact->id)
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

        return view('contact_edit', ['contact' => $contact, 'data' => $data, 'users' => $users])->with('success', 'Contact updated.');
    }

    /**
     * Remove the specified contact from storage.
     */

    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            "name" => ['required'],
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'digits_between:10,15'],
            'company' => ['required'],
            'position' => ['required'],
            'sales_representative_id' => ['required', 'integer', 'exists:users,id']
        ]);
        $contact->update($data);
        return redirect()->route('contact_page');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contact_page')->with('success', 'Contact deleted.');
    }
}
