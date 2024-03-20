<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EveryoneController extends Controller
{

    public function index() // Dashboard Page admin
    {
        return view('pages.admin.dashboard');
    }

    public function userIndex() // dashboard page user
    {
        return view('pages.user.dashboard');
    }
}
