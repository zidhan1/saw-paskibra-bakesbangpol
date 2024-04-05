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
}
