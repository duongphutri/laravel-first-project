<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Models\admin;
use ILLumninate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
{

    public function index()
    {
        $admin = admin::all();

        return view('admin_login', ['admin' => $admin]);
    }
    public function show_dashboard()
    {
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {

        $admin = admin::all();

        return view('admin.dashboard', ['admins' => $admin]);
    }
    public function logout()
    { }
}
