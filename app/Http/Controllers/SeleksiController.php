<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Berkas;
use App\Models\Peserta;
use App\Models\RegisDate;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;

class SeleksiController extends Controller
{
    public function index()
    {
        $data = Berkas::where('jenis', '=', 'admin')
            ->orWhere('jenis', '=', 'pernyataan')
            ->get();
        return view('pages.admin.seleksi', compact('data'));
    }

    public function store(Request $request)
    {
        $dateCarbon = Carbon::parse($request->tanggal_masuk);
        $dateRegistration = $dateCarbon->year;

        $dateValidation = RegisDate::all();

        foreach ($dateValidation as $key => $date) {
            $dateValid = Carbon::parse($date->tanggal_mulai);
            $dateValids = $dateValid->year;
            if ($dateValids === $dateRegistration) {
                return redirect('data-seleksi')->with('failed', 'Data pada tahun tersebut telah ditambahkan');
            }
        }


        $validation = $request->validate([
            'nama_berkas' => ['required', 'mimes:pdf'],
            'surat_pernyataan' => ['required', 'mimes:pdf'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date']
        ]);

        // Get the original file name
        $originalFilename = $request->file('nama_berkas')->getClientOriginalName();

        // Generate a unique file name
        $newFilename =  $dateRegistration . '_' . $originalFilename;

        // Store the uploaded file with the new file name
        $imagePath = $request->nama_berkas->move(public_path('file'), $newFilename);


        //Generate name surat pernyataan
        $nameSuratPernyataan = 'Template surat pernyataan_' . $dateRegistration . '.pdf';

        // store surat pernyataan
        $suratPath = $request->surat_pernyataan->move(public_path('file'), $nameSuratPernyataan);

        $auth = Auth()->user();
        $id_peserta = Peserta::where('id_user', '=', $auth->id)->get();
        //dd($id_peserta);

        $dataBerkas = Berkas::createOrFirst([
            'nama_berkas' => $newFilename,
            //'id_peserta' => $id_peserta->id,
            'jenis' => 'admin',
            'tahun' => $dateRegistration
        ]);

        $dataSurat = Berkas::createOrFirst(
            ['nama_berkas' => $nameSuratPernyataan],
            [
                'nama_berkas' => $nameSuratPernyataan,
                //'id_peserta' => $id_peserta->id,
                'jenis' => 'pernyataan',
                'tahun' => $dateRegistration
            ]
        );

        // dd($dataBerkas);

        $dataRegistration = RegisDate::createOrFirst([
            'startdate' => $request->tanggal_mulai,
            'enddate' => $request->tanggal_selesai,
            'id_berkas' => $dataBerkas->id
        ]);

        return redirect('data-seleksi')->with('success', 'Berhasil menambahkan data');
    }

    public function delete($id)
    {
        $data = Berkas::findOrFail($id);
        $data->delete();
        return redirect('data-seleksi')->with('success', 'Berhasil menghapus data');
    }
}
