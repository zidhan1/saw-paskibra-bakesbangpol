<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Login 
    public function index()
    {
        return view("auth.login");
    }
}
