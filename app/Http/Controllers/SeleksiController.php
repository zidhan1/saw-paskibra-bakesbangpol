<?php

namespace App\Http\Controllers;

use App\Models\Seleksi;
use Illuminate\Http\Request;

class SeleksiController extends Controller
{
    public function index()
    {
        $data = Seleksi::all();
        return view('pages.admin.seleksi', compact('data'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date'],
            'keterangan' => ['required', 'string', 'max:255']
        ]);

        $data = Seleksi::firstOrCreate([
            'nama' => $request->nama,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'keterangan' => $request->keterangan
        ]);

        return redirect('data-seleksi')->with('success', 'Berhasil menambahkan jadwal seleksi');
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date'],
            'keterangan' => ['required', 'string', 'max:255']
        ]);

        $data = [
            'nama' => $request->nama,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'keterangan' => $request->keterangan
        ];

        $update = Seleksi::findOrFail($id);

        $update->update($data);
        return redirect('data-seleksi')->with('success', 'Berhasil Mengupdate jadwal seleksi');
    }

    public function delete($id)
    {
        $data = Seleksi::findOrFail($id);

        $data->deleteOrFail();
        return redirect('data-seleksi')->with('success', 'Berhasil Menghapus jadwal seleksi');
    }
}
