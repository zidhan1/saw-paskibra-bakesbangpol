<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bahasa;
use App\Models\Berkas;
use App\Models\Peserta;

use App\Models\Seleksi;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    // View Jadwal seleksi
    public function indexSeleksi()
    {
        $dateNow = Carbon::today();
        $dateNow = $dateNow->year;

        $data = Berkas::where('tahun', '=', $dateNow)
            ->where('jenis', '=', 'admin')->get();

        //dd($data);
        $auth = Auth()->user();
        return view('pages.user.seleksi', compact('data', 'auth'));
    }

    // view detail jadwal seleksi
    public function viewSeleksi($id)
    {
        $data = Seleksi::findOrFail($id);
        return view('pages.user.lihatseleksi', compact('data'));
    }

    // melihat data diri 
    public function profile()
    {
        $auth = Auth()->user();
        $data =  Peserta::where('id_user', '=', $auth->id)->first();
        if ($data != null)
            $bahasa = Bahasa::where('id_peserta', '=', $data->id)->get();
        else
            $bahasa = collect();


        return view('pages.user.profile', compact('data', 'bahasa'));
    }

    // hasil seleksi
    public function hasilSeleksi()
    {
        $tahun = peserta::where('id_user', '=', Auth()->user()->id)->first();

        $peserta = Peserta::join('hasil', 'peserta.id', '=', 'hasil.id_peserta')
            ->where('peserta.tahun_daftar', '=', $tahun->tahun_daftar)
            ->select('peserta.*', 'hasil.id_peserta', 'hasil.hasil')
            ->orderByDesc('peserta.tahun_daftar')
            ->orderByDesc('hasil')
            ->get();

        $decision = Peserta::join('hasil', 'peserta.id', '=', 'hasil.id_peserta')
            ->join('users', 'peserta.id_user', 'users.id')
            ->where('peserta.tahun_daftar', '=', $tahun->tahun_daftar)
            ->where('users.id', '=', Auth()->user()->id)
            ->select('peserta.*', 'hasil.id_peserta', 'hasil.hasil')
            ->orderByDesc('peserta.tahun_daftar')
            ->orderByDesc('hasil')
            ->first();
        // dd($decision);

        return view('pages.user.hasil', compact('peserta', 'decision'));
    }
}
