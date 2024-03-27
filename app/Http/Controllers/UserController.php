<?php

namespace App\Http\Controllers;

use App\Models\Seleksi;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // View Jadwal seleksi
    public function indexSeleksi()
    {
        $data = Seleksi::all();
        $auth = Auth()->user();
        return view('pages.user.seleksi', compact('data', 'auth'));
    }

    // view detail jadwal seleksi
    public function viewSeleksi($id)
    {
        $data = Seleksi::findOrFail($id);
        return view('pages.user.lihatseleksi', compact('data'));
    }
}
