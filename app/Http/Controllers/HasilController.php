<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Nilai;
use App\Models\Peserta;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HasilController extends Controller
{
    // Perhitungan Metode SAW
    public function calculateSaw($tahun)
    {
        // Data peserta dan nilai
        $peserta = Peserta::where('peserta.tahun_daftar', '=', $tahun)
            ->get();
        $nilai_peserta = Nilai::all();

        // Data peserta
        foreach ($peserta as $key => $value) {
            $id_peserta[$key] = $value->id;
        }

        // Data kriteria
        $kriteria = Kriteria::all();
        foreach ($kriteria as $key => $value) {
            $bobot[$key] = $value->bobot;
            $tipe[$key] = $value->tipe;
            $id_kriteria[$key] = $value->id;
        }

        // Menginisiasikan nilai peserta
        foreach ($peserta as $keyT => $valueT) {
            foreach ($kriteria as $keyY => $valueY) {
                $nilai[$keyT][$keyY] = \App\Helper::nilai($id_peserta[$keyT], $id_kriteria[$keyY]);
                $first_value[$keyT][$keyY] = number_format($nilai[$keyT][$keyY], 2);
            }
        }
        // dd($nilai);

        // Mencari Pembagi
        foreach ($kriteria as $keyT => $valueT) {
            foreach ($peserta as $keyY => $valueY) {
                $type[$keyT][$keyY] =  $nilai[$keyY][$keyT];
            }
            if ($valueT->tipe == "benefit") {
                $pembagi[] = max($type[$keyT]);
            } else {
                $pembagi[] = min($type[$keyT]);
            }
        }


        // Menghitung Nilai Normalisasi
        foreach ($peserta as $keyT => $valueT) {
            foreach ($kriteria as $keyY => $valueY) {
                $nilai[$keyT][$keyY] = ($nilai[$keyT][$keyY] / $pembagi[$keyY]);
                $normalisasi[$keyT][$keyY] = number_format($nilai[$keyT][$keyY], 2);
            }
        }

        // Menghitung Preferensi
        foreach ($peserta as $keyT => $valueT) {
            foreach ($kriteria as $keyY => $valueY) {
                $result[$keyT][$keyY] = ($bobot[$keyY] * $nilai[$keyT][$keyY]);
            }
            $final_result[$keyT] = array_sum($result[$keyT]);
            $final_result[$keyT] = number_format($final_result[$keyT], 2);
        }


        foreach ($peserta as $key => $value) {
            $data[] = [
                'id_peserta' => $value->id,
                'nama_lengkap' => $value->nama_lengkap,
                'nilai' => $final_result[$key]
            ];
        }

        $data_asli = $data;

        $data = collect($data)->sortByDesc(function ($item) {
            return floatval($item['nilai']);
        })->values()->all();

        // dd($data_asli);

        return view('pages.admin.perhitungan', compact('peserta', 'kriteria', 'first_value', 'normalisasi', 'data', 'data_asli'));
    }

    public function store(Request $request)
    {

        $jumlahPeserta = $request->input('data_nama');
        // dd($jumlahPeserta);
        foreach ($jumlahPeserta as $key => $value) {
            $data = Hasil::firstOrCreate(
                ['id_peserta' => $request->input('id_peserta')[$key]],
                [
                    'id_peserta' => $request->input('id_peserta')[$key],
                    'hasil' => $request->input('nilai')[$key]
                ]
            );
        }

        // dd($jumlahPeserta);
        return redirect('rangking');
    }

    public function view()
    {
        $data = Peserta::join('hasil', 'peserta.id', '=', 'hasil.id_peserta')
            ->select('peserta.*', 'hasil.id_peserta', 'hasil.hasil')
            ->orderByDesc('peserta.tahun_daftar')
            ->orderByDesc('hasil')
            ->get();
        // dd($data);
        return view('pages.admin.rangking', compact('data'));
    }

    public function validation($id, Request $request)
    {
        $data = Peserta::findOrFail($id);
        $data->validation = $request->result;
        // dd($data->validation);
        $data->update();
        return redirect('rangking');
    }
}
