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
        $contacts = Contact::with(['salesRep', 'creator'])->get();
        $users = User::where('role', 'Sales Representative')->get(); // adjust as needed
        return view('contact_page', compact('contacts', 'users'));
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
     * Update the specified contact in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            "name" => ['required'],
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'digits_between:10,15'],
            'company' => ['required'],
            'position' => ['required'],
            'sales_representative_id' => ['required', 'integer', 'exists:users,id'],
        ]);

        $contact->update($data);

        return redirect()->route('contact_page')->with('success', 'Contact updated.');
    }

    /**
     * Remove the specified contact from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contact_page')->with('success', 'Contact deleted.');
    }
}
//m