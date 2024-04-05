<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index($id)
    {
        dd(Nilai::all());
    }
    // Halaman tambah nilai peserta
    public function insertvalue($id)
    {
        $data = Nilai::findOrFail($id);
        return view('pages.admin.nilai', compact('data'));
    }
}
