<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Hasil;
use App\Models\Nilai;
use App\Models\Peserta;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class HasilController extends Controller
{
    // Perhitungan Metode SAW
    public function calculateSaw($tahun)
    {
        // Data peserta dan nilai
        $peserta = Peserta::select('nilai.nilai', 'peserta.*')
            ->join('nilai', 'peserta.id', '=', 'nilai.id_peserta')
            ->join('kriteria', 'nilai.id_kriteria', '=', 'kriteria.id')
            ->where('peserta.tahun_daftar', '=', $tahun)
            ->where('peserta.options', '=', '1')
            ->where('kriteria.nama_kriteria', '=', 'parade')
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
                $normalisasi[$keyT][$keyY] = $nilai[$keyT][$keyY];
            }
        }

        // Menghitung Preferensi
        foreach ($peserta as $keyT => $valueT) {
            foreach ($kriteria as $keyY => $valueY) {
                $result[$keyT][$keyY] = ($bobot[$keyY] * $nilai[$keyT][$keyY]);
            }
            $final_result[$keyT] = array_sum($result[$keyT]);
            $final_result[$keyT] = number_format($final_result[$keyT], 10);
        }

        // // Hitung berapa kali setiap nilai muncul
        // $count_values = array_count_values($final_result);

        // // Periksa apakah ada nilai yang muncul lebih dari satu kali
        // $duplicates_found = false;
        // foreach ($count_values as $value => $count) {
        //     if ($count > 1) {
        //         $duplicates_found = true;
        //         dd("Nilai $value muncul sebanyak $count kali dalam array.\n");
        //     }
        // }

        // if (!$duplicates_found) {
        //     dd("Tidak ada nilai yang muncul lebih dari satu kali dalam array.\n");
        // }


        foreach ($peserta as $key => $value) {
            $data[] = [
                'id_peserta' => $value->id,
                'nama_lengkap' => $value->nama_lengkap,
                'nilai' => $final_result[$key],
                'nilai_parade' => $value->nilai,
                'tahun_daftar' => $value->tahun_daftar
            ];
        }

        $data_asli = $data;

        $data = collect($data)
            ->sortByDesc(function ($item) {
                return $item['nilai_parade'];
            })
            ->sortByDesc(function ($item) {
                return $item['nilai'];
            })
            ->values()
            ->all();


        // dd($data);

        return view('pages.admin.perhitungan', compact('peserta', 'kriteria', 'first_value', 'normalisasi', 'data', 'data_asli'));
    }

    public function store(Request $request)
    {
        $valid = $request->jmlvalid;
        $jumlahPeserta = $request->input('data_nama');
        // dd($valid);

        $dataTampung = Hasil::select('hasil.hasil', 'peserta.*')
            ->join('peserta', 'hasil.id_peserta', '=', 'peserta.id')
            ->where('peserta.tahun_daftar', '=', $request->input('tahun')[0])
            ->orderBy('hasil.hasil', 'desc')
            ->get();

        $dataSave = Hasil::select('nilai.nilai AS nilai_parade', 'hasil.hasil', 'peserta.*')
            ->join('peserta', 'hasil.id_peserta', '=', 'peserta.id')
            ->join('nilai', 'peserta.id', '=', 'nilai.id_peserta')
            ->join('kriteria', 'nilai.id_kriteria', '=', 'kriteria.id')
            ->where('peserta.tahun_daftar', '=', $request->input('tahun')[0])
            ->where('kriteria.nama_kriteria', '=', 'parade')
            ->orderBy('hasil.hasil', 'desc')
            ->orderByDesc('nilai_parade')
            ->take($valid)
            ->get();

        // dd($dataSave);

        // Delete hasil lama
        if ($dataTampung !== null) {
            foreach ($dataTampung as $updateData) {
                $update = Hasil::where('id_peserta', '=', $updateData->id)->first();
                $update->delete();
            }
        }

        foreach ($jumlahPeserta as $key => $value) {
            $data = Hasil::firstOrCreate(
                ['id_peserta' => $request->input('id_peserta')[$key]],
                [
                    'id_peserta' => $request->input('id_peserta')[$key],
                    'hasil' => $request->input('nilai')[$key]
                ]
            );
        }

        // Reset data validation
        $tahun = $request->input('tahun')[0];
        DB::statement("UPDATE peserta SET validation = 'not validated' WHERE tahun_daftar = ?", [$tahun]);

        // dd($dataSave);
        foreach ($dataSave as $updateData) {
            $update = Peserta::find($updateData->id);
            $update->validation = "validated";
            $update->update();
        }

        return redirect('rangking');
    }

    public function view()
    {
        $data = Hasil::select('nilai.nilai AS nilai_parade', 'hasil.id_peserta', 'hasil.hasil', 'peserta.*')
            ->join('peserta', 'hasil.id_peserta', '=', 'peserta.id')
            ->join('nilai', 'peserta.id', '=', 'nilai.id_peserta')
            ->join('kriteria', 'nilai.id_kriteria', '=', 'kriteria.id')
            ->where('kriteria.nama_kriteria', '=', 'parade')
            ->orderByDesc('peserta.tahun_daftar')
            ->orderBy('hasil.hasil', 'desc')
            ->orderByDesc('nilai_parade')
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

    public function generatePdf($tahun)
    {
        $data = Peserta::join('hasil', 'peserta.id', '=', 'hasil.id_peserta')
            ->select('peserta.*', 'hasil.id_peserta', 'hasil.hasil')
            ->where('peserta.tahun_daftar', '=', $tahun)
            ->orderByDesc('peserta.tahun_daftar')
            ->orderByDesc('hasil')
            ->get();
        $data_tahun = $tahun;

        $html =  view('pages.admin.pdftemplate', compact('data', 'data_tahun'));

        $options = new Options();

        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        return $dompdf->stream('laporan.pdf');
    }
}
