<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Lead;
use App\Models\Contact;
use App\Models\Task;
use Carbon\Carbon;
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
        $total_leads = Lead::count();
        $leads_won = Lead::where('stage', '=', 'won')->count();
        $leads_lost = Lead::where('stage', '=', 'lost')->count();
        $leads_ongoing = Lead::whereIn('stage', ['new', 'contacted', 'proposal sent'])->count();
        $assigned_leads = Lead::leftJoin('users as assignee', 'leads.assigned_to', '=', 'assignee.id')
            ->select([
                'assignee.first_name',
                'assignee.last_name',
                DB::raw('COUNT(*) as count'),
            ])
            ->groupBy('leads.assigned_to')
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        $conversion = DB::table('leads')
            ->selectRaw("strftime('%m', closing_date) as month, COUNT(*) as count") // use MONTH() if MySQL
            ->where('stage', 'won')
            ->whereYear('closing_date', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('dashboard', [
            'total_leads' => $total_leads,
            'leads_won' => $leads_won,
            'leads_lost' => $leads_lost,
            'leads_ongoing' => $leads_ongoing,
            'assigned_leads' => $assigned_leads,
            'conversion' => $conversion
        ]);
    }

    public function pipelines()
    {
        $status_new = Lead::where('stage', '=', 'new')->get();
        $status_contacted = Lead::where('stage', '=', 'contacted')->get();
        $status_proposal_sent = Lead::where('stage', '=', 'proposal sent')->get();
        $status_won = Lead::where('stage', '=', 'won')->get();
        $status_lost = Lead::where('stage', '=', 'lost')->get();



        return view('pipelines_page', [
            'status_new' => $status_new,
            'status_contacted' => $status_contacted,
            'status_proposal_sent' => $status_proposal_sent,
            'status_won' => $status_won,
            'status_lost' => $status_lost,

        ]);
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
        $tasks = Task::leftJoin('users as assignee', 'assignee.id', '=', 'tasks.sales_representative_id')
            ->select([
                'tasks.id',
                'assignee.first_name as assigned_to_first_name',
                'assignee.last_name as assigned_to_last_name',
                'tasks.title',
                'tasks.due_date',
                'tasks.status',
                'tasks.priority'
            ])
            ->get();
        $users = User::all();
        return view('tasks', ['tasks' => $tasks, 'users' => $users]);
    }

    public function adminAccessUser()
    {
        $users = User::all(); // fetch all users from the database
        return view('admin_access_user', compact('users')); // pass users to the view
    }
}
