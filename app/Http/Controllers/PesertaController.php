<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Auth;
use DateTime;
use Carbon\Carbon;

class PesertaController extends Controller
{
    // index user middleware
    public function index()
    {
        $auth = Auth()->user();
        $validation =  Peserta::where('id_user', '=', $auth->id)->first();
        if ($validation === null) {
            return view('pages.user.pendaftaran', compact('validation'));
        } else {
            return view('pages.user.telahdaftar', compact('validation'));
        }
    }

    // menambahkan data peserta / pendaftaran (user middleware)
    public function store(Request $request)
    {
        $validator = $request->validate([
            "nama_lengkap" => ['required', 'string', 'max:255'],
            "nama_panggilan" => ['required', 'string', 'max:255'],
            "jenis_kelamin" => ['required', 'string', 'max:255'],
            "alamat" => ['required', 'string'],
            "tempat_lahir" => ['required', 'string', 'max:255'],
            "tanggal_lahir" => ['required',],
            "agama" => ['required', 'string', 'max:255'],
            "bahasa" => ['required', 'string', 'max:255'],
            "bb" => ['required', 'numeric'],
            "no_hp" => ['required', 'numeric'],
            "tb" => ['required', 'numeric'],
            "asal_sekolah"  => ['required', 'string', 'max:255'],
            "alamat_sekolah"  => ['required', 'string', 'max:255'],
            "email_sekolah"  => ['required', 'string', 'max:255'],
            "nama_ayah"  => ['required', 'string', 'max:255'],
            "pekerjaan_ayah"  => ['required', 'string', 'max:255'],
            "no_hp_ayah"  => ['required', 'string', 'max:255'],
            "nama_ibu"  => ['required', 'string', 'max:255'],
            "pekerjaan_ibu"  => ['required', 'string', 'max:255'],
            "no_hp_ibu"  => ['required', 'string', 'max:255'],
        ]);

        $my_year = Carbon::now()->year;
        $auth = Auth()->user();
        $data = Peserta::create([
            "id_user" => $auth->id,
            "nama_lengkap" => $request->nama_lengkap,
            "nama_panggilan" => $request->nama_panggilan,
            "jenis_kelamin" => $request->jenis_kelamin,
            "alamat" => $request->alamat,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "agama" => $request->agama,
            "bahasa" => $request->bahasa,
            "bb" => $request->bb,
            "no_hp" => $request->no_hp,
            "tb" => $request->tb,
            "asal_sekolah"  => $request->asal_sekolah,
            "alamat_sekolah"  => $request->alamat_sekolah,
            "email_sekolah"  => $request->email_sekolah,
            "nama_ayah"  => $request->nama_ayah,
            "pekerjaan_ayah"  => $request->pekerjaan_ayah,
            "no_hp_ayah" => $request->no_hp_ayah,
            "nama_ibu" => $request->nama_ibu,
            "pekerjaan_ibu"  => $request->pekerjaan_ibu,
            "no_hp_ibu"  => $request->no_hp_ibu,
            "tahun_daftar"  => $my_year,
            "options" => 1
        ]);

        return redirect('jadwal-seleksi')->with('success', 'Berhasil melakukan pendaftaran');
    }

    // user middleware
    public function destroy($id)
    {
        $data = Peserta::findOrFail($id);
        $data->delete();
        return redirect('jadwal-seleksi')->with('success', 'Berhasil melakukan pembatalan pendaftaran');
    }

    // admin middleware
    public function indexAdmin()
    {
        $data = Peserta::all();
        return view('pages.admin.peserta', compact('data'));
    }
}
