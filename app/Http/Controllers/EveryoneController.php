<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EveryoneController extends Controller
{

    public function index() // Dashboard Page
    {
        return view('pages.dashboard');
    }
}
