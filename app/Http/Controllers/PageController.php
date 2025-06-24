<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landingPage() {
        return view('landing_page');
    }

    public function contact() {
        return view('contact');
    }

    public function signIn() {
        return view('sign_in');
    }

    public function registration() {
        return view('registration');
    }

    public function dashboard() {
        return view('dashboard');
    }

    public function pipelines() {
        return view('pipelines_page');
    }

    public function leads() {
        return view('leads');
    }

    public function contacts() {
        return view('contact_page');
    }

    public function tasks() {
        return view('tasks');
    }

    public function adminAccessUser() {
        return view('admin_access_user');
    }
}
