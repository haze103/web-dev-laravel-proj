<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lead;
use App\Models\Contact;

class PageController extends Controller
{
    public function landingPage()
    {
        return view('landing_page');
    }

    public function contact()
    {
        return view('contact');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function pipelines()
    {
        return view('pipelines_page');
    }

    public function leads()
    {
        $leads = Lead::leftJoin('users as creator', 'creator.id', '=', 'leads.created_by')
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
            ->get();

        $users = User::all();

        return view('leads', ['leads' => $leads, 'users' => $users]);
    }

    public function contacts()
    {
        $contacts = Contact::leftJoin('users as creator', 'creator.id', '=', 'contacts.created_by')
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
            ->get();
        $users = User::all();
        return view('contact_page', ['contacts' => $contacts, 'users' => $users]);
    }

    public function tasks()
    {
        return view('tasks');
    }

    public function adminAccessUser()
    {
        $users = User::all(); // fetch all users from the database
        return view('admin_access_user', compact('users')); // pass users to the view
    }
}
