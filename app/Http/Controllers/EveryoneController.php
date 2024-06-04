<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hasil;
use App\Models\Peserta;
use App\Models\Kriteria;
use App\Models\RegisDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EveryoneController extends Controller
{

    public function index() // Dashboard Page admin
    {
        $peserta = Peserta::where('options', '=', 1)->count();
        $kriteria = Kriteria::count();
        $jadwal = RegisDate::count();
        return view('pages.admin.dashboard', compact('peserta', 'kriteria', 'jadwal'));
    }

    public function userIndex() // dashboard page user
    {
        $tahun = peserta::where('id_user', '=', Auth()->user()->id)->first();
        if ($tahun === null) {
            $tahun = (object)['tahun_daftar' => '2000'];
        }

        // dd($tahun);

        $peserta = collect();
        $decision = collect([
            'validation' => null
        ]);
        // dd($decision->get('validation'));
        if ($tahun !== null) {
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
        }

        // dd($decision);

        return view('pages.user.dashboard',  compact('peserta', 'decision'));
    }

    public function userSetting() // User Settings
    {
        $data = User::find(Auth()->user()->id);
        return view('pages.user.settings', compact('data'));
    }

    public function userNewPassword(Request $request) // user new password
    {
        $validate = $request->validate([
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'min:8'],
            'repeatPassword' => ['required', 'same:password']
        ]);

        $data = User::find(Auth()->user()->id);

        $data->password = Hash::make($request->password);
        $data->update();

        return redirect('user-settings')->with('success', 'Passowrd berhasil diubah');
    }

    public function userDestroy()
    {
        $data = User::findOrFail(Auth()->user()->id);
        $data->delete();
        return redirect('/');
    }


    public function adminSetting() // admin Settings
    {
        $data = User::find(Auth()->user()->id);
        return view('pages.admin.settings', compact('data'));
    }

    public function adminNewPassword(Request $request) // admin new password
    {
        $validate = $request->validate([
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'min:8'],
            'repeatPassword' => ['required', 'same:password']
        ]);

        $data = User::find(Auth()->user()->id);

        $data->password = Hash::make($request->password);
        $data->update();

        return redirect('admin-settings')->with('success', 'Passowrd berhasil diubah');
    }

    public function adminDestroy()
    {
        $data = User::findOrFail(Auth()->user()->id);
        $data->delete();
        return redirect('/');
    }
}
