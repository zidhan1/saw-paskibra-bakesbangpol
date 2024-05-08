<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Peserta;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    // Halaman tambah nilai peserta
    public function insertvalue($id)
    {
        $data = Peserta::find($id);
        // dd($id);
        $kriteria = Kriteria::all();
        $value = Nilai::where('id_peserta', '=', $id)->get();
        if ($value->isEmpty())
            $value = collect();

        return view('pages.admin.nilai', compact('data', 'kriteria', 'value'));
    }

    public function store($id, Request $request)
    {
        $validation = $request->validate([
            'kriteria_1' => ['required', 'numeric'],
            'kriteria_2' => ['required', 'numeric'],
            'kriteria_3' => ['required', 'numeric'],
            'kriteria_4' => ['required', 'numeric'],
            'kriteria_5' => ['required', 'numeric'],
            'kriteria_6' => ['required', 'numeric'],
            'kriteria_7' => ['required', 'numeric'],
        ]);

        $kriteria = Kriteria::all();

        foreach ($kriteria as $key => $value) {
            Nilai::firstOrCreate(
                ['id_peserta' => $id, 'id_kriteria' => $value->id],
                ['id_peserta' => $id, 'id_kriteria' => $value->id, 'nilai' => $request->input('kriteria_' . $key + 1)]
            );
        }

        return redirect("nilai/add/{$id}")->with('success', 'Berhasil menambahkan nilai');
    }

    public function update($id, Request $request)
    {
        // dd($id);
        $validation = $request->validate([
            'kriteria_1' => ['required', 'numeric'],
            'kriteria_2' => ['required', 'numeric'],
            'kriteria_3' => ['required', 'numeric'],
            'kriteria_4' => ['required', 'numeric'],
            'kriteria_5' => ['required', 'numeric'],
            'kriteria_6' => ['required', 'numeric'],
            'kriteria_7' => ['required', 'numeric'],
        ]);

        $kriteria = Kriteria::all();

        foreach ($kriteria as $key => $value) {
            Nilai::updateOrCreate(
                ['id_peserta' => $id, 'id_kriteria' => $value->id],
                ['id_peserta' => $id, 'id_kriteria' => $value->id, 'nilai' => $request->input('kriteria_' . $key + 1)]
            );
        }

        return redirect("nilai/add/{$id}")->with('success', 'Berhasil memperbarui nilai');
    }
}
