<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $data = Kriteria::all();
        return view('pages.admin.kriteria', compact('data'));
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'nama_kriteria' => ['required', 'string', 'max:255'],
            'bobot' => ['required', 'numeric']
        ]);

        $data = Kriteria::find($id);

        $data->nama_kriteria = $request->nama_kriteria;
        $data->bobot = $request->bobot;
        $data->tipe = $request->tipe;
        $data->update();
        return redirect('kriteria')->with('success', 'Data Berhasil Di Update');
    }
}
