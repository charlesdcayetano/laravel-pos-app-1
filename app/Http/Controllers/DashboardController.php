<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        $user = auth()->user();

        // dd($user->role_id);

        switch ($user->role_id) {
            case 1:
                return view('dashboard.admin');
                break;
            case 2:
                return view('dashboard.manager');
                break;
            default:
                return view('dashboard.employee');
        }
    }
}
