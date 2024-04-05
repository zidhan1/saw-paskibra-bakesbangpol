<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Berkas;
use App\Models\Peserta;
use App\Models\RegisDate;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    // Halaman index
    public function index()
    {
        $dateNow = Carbon::today();
        $dateNow = $dateNow->year;

        $data = RegisDate::join('berkas', 'berkas.id', '=', 'regisdate.id_berkas')
            ->where('berkas.tahun', '=', $dateNow)->first();

        $surat = Berkas::where('tahun', '=', $dateNow)
            ->where('jenis', '=', 'pernyataan')->first();

        $auth = Auth()->user();
        $id_peserta = Peserta::where('id_user', '=', $auth->id)->first();

        if ($id_peserta !== null)
            $validated = Berkas::where('id_peserta', '=', $id_peserta->id)->first();
        else
            $validated = collect();

        return view('pages.user.pendaftaran', compact('data', 'surat', 'validated', 'id_peserta'));
    }

    public function store(Request $request)
    {
        $auth = Auth()->user();
        $id_peserta = Peserta::where('id_user', '=', $auth->id)->first();

        $validated = Berkas::where('id_peserta', '=', $id_peserta->id)->first();

        if ($request->radiopilihan === "tidak bersedia" || $request->radiopilihan === null) {
            return redirect('user-pendaftaran')->with('failed', 'Anda harus bersedia menerima persyaratan.');
        }

        $dateCarbon = Carbon::parse($request->tanggal_masuk);
        $dateRegistration = $dateCarbon->year;

        $validation = $request->validate([
            'surat_pernyataan' => ['required', 'mimes:pdf,doc,docx'],
        ]);

        //Generate name surat pernyataan
        $nameSuratPernyataan = 'Surat pernyataan_peserta_' . $dateRegistration;

        // store surat pernyataan
        $suratPath = $request->surat_pernyataan->move(public_path('file'), $nameSuratPernyataan);

        $dataBerkas = Berkas::createOrFirst([
            'nama_berkas' => $nameSuratPernyataan,
            'id_peserta' => $id_peserta->id,
            'jenis' => 'user',
            'tahun' => $dateRegistration
        ]);

        return redirect('user-pendaftaran');
    }
}
