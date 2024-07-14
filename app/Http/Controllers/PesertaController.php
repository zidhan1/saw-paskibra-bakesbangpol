<?php

namespace App\Http\Controllers;

use Auth;
use DateTime;
use Carbon\Carbon;
use App\Models\Bahasa;
use App\Models\Peserta;
use App\Models\Seleksi;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;


class PesertaController extends Controller
{
    // menambahkan data peserta / pendaftaran (user middleware)
    public function store(Request $request)
    {
        //dd($request->file('pathprofile')->getClientOriginalName());
        $validator = $request->validate([
            "pathprofile" => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            "nama_lengkap" => ['required', 'string', 'max:255'],
            "nama_panggilan" => ['required', 'string', 'max:255'],
            "jenis_kelamin" => ['required', 'string', 'max:255'],
            "alamat" => ['required', 'string'],
            "tempat_lahir" => ['required', 'string', 'max:255'],
            "tanggal_lahir" => ['required',],
            "agama" => ['required', 'string', 'max:255'],
            "bb" => ['required', 'numeric'],
            "no_hp" => ['required', 'numeric'],
            "tb" => ['required', 'numeric'],
            "asal_sekolah"  => ['required', 'string', 'max:255'],
            "alamat_sekolah"  => ['required', 'string', 'max:255'],
            "email_sekolah"  => ['required', 'string', 'max:255'],
        ]);

        $my_year = Carbon::now()->year;
        $auth = Auth()->user();

        // nama path profile
        $pathprofilename = 'profile' . '_' . $auth->id . '_' . $request->file('pathprofile')->getClientOriginalName();

        $data = Peserta::createOrFirst([
            "profilepath" => $pathprofilename,
            "id_user" => $auth->id,
            "nama_lengkap" => $request->nama_lengkap,
            "nama_panggilan" => $request->nama_panggilan,
            "jenis_kelamin" => $request->jenis_kelamin,
            "alamat" => $request->alamat,
            "tempat_lahir" => $request->tempat_lahir,
            "tanggal_lahir" => $request->tanggal_lahir,
            "agama" => $request->agama,
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

        // pindah profile 
        $request->pathprofile->move(public_path('file/profile'), $pathprofilename);

        $bahasaArray = $request->bahasa;
        $tingkatBahasaArray = $request->tingkat_bahasa;
        $peserta = Peserta::where('id_user', '=',  $auth->id)->first();
        // dd($tingkatBahasaArray);
        // Lakukan loop untuk mengolah data
        foreach ($bahasaArray as $key => $bahasa) {
            $data = Bahasa::createOrFirst([
                'id_peserta' => $peserta->id,
                'nama_bahasa' => $bahasa,
                'tingkat_bahasa' => $tingkatBahasaArray[$key]
            ]);
        }

        return redirect('user-profile')->with('success', 'Berhasil menyimpan data');
    }

    public function update(Request $request)
    {
        // dd("ke update");
        $validator = $request->validate([
            "pathprofile" => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            "nama_lengkap" => ['required', 'string', 'max:255'],
            "nama_panggilan" => ['required', 'string', 'max:255'],
            "jenis_kelamin" => ['required', 'string', 'max:255'],
            "alamat" => ['required', 'string'],
            "tempat_lahir" => ['required', 'string', 'max:255'],
            "tanggal_lahir" => ['required',],
            "agama" => ['required', 'string', 'max:255'],
            "bb" => ['required', 'numeric'],
            "no_hp" => ['required', 'numeric'],
            "tb" => ['required', 'numeric'],
            "asal_sekolah"  => ['required', 'string', 'max:255'],
            "alamat_sekolah"  => ['required', 'string', 'max:255'],
            "email_sekolah"  => ['required', 'string', 'max:255'],
        ]);

        $my_year = Carbon::now()->year;
        $auth = Auth()->user();

        $pathlama = Peserta::where('id_user', '=', $auth->id)->first();

        // nama path profile
        if ($request->hasFile('profilepath')) {
            $pathprofilename = 'profile' . '_' . $auth->id . '_' . $request->file('pathprofile')->getClientOriginalName();
        } else {
            $pathprofilename = $pathlama->profilepath;
        }

        // Hapus gambar profil lama
        // dd(Storage);
        if ($request->hasFile('pathprofile')) {
            if (Storage::exists('profile/' . $pathlama->profilepath)) {
                Storage::delete('profile/' . $pathlama->profilepath);
            }
        }

        $data = Peserta::updateOrCreate(
            ["id_user" => $auth->id],
            [
                "profilepath" => $pathprofilename,
                "id_user" => $auth->id,
                "nama_lengkap" => $request->nama_lengkap,
                "nama_panggilan" => $request->nama_panggilan,
                "jenis_kelamin" => $request->jenis_kelamin,
                "alamat" => $request->alamat,
                "tempat_lahir" => $request->tempat_lahir,
                "tanggal_lahir" => $request->tanggal_lahir,
                "agama" => $request->agama,
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
            ]
        );

        // pindah profile 
        if ($request->hasFile('pathprofile')) {
            $request->pathprofile->move(public_path('file/profile'), $pathprofilename);
        }

        $bahasaArray = $request->bahasa;
        $tingkatBahasaArray = $request->tingkat_bahasa;
        $peserta = Peserta::where('id_user', '=',  $auth->id)->first();

        // Hapus semua bahasa
        $oldbahasa = Bahasa::where('id_peserta', '=', $peserta->id)->get();
        foreach ($oldbahasa as $bahasa) {
            $bahasa->delete();
        }

        // Lakukan loop untuk mengolah data
        foreach ($bahasaArray as $key => $bahasa) {
            $data = Bahasa::updateOrCreate([
                'id_peserta' => $peserta->id,
                'nama_bahasa' => $bahasa,
                'tingkat_bahasa' => $tingkatBahasaArray[$key]
            ]);
        }

        return redirect('user-profile')->with('success', 'Berhasil mengupdate data');
    }

    // user middleware
    public function destroy($id)
    {
        $data = Peserta::findOrFail($id);
        $data->delete();
        return redirect('user-profile')->with('success', 'Berhasil melakukan pembatalan pendaftaran');
    }

    // admin middleware
    public function indexAdmin()
    {
        $data = Peserta::join('berkas', 'peserta.id', '=', 'berkas.id_peserta')
            ->leftJoin('nilai', 'peserta.id', '=', 'nilai.id_peserta')
            ->select('peserta.*', 'berkas.id_peserta', 'berkas.nama_berkas', 'berkas.jenis', 'berkas.tahun', 'nilai.id_peserta AS cekNilai')
            ->where('options', '=', '1')
            ->distinct('peserta.id')
            ->orderByDesc('peserta.created_at')
            ->get();
        // dd($data);

        return view('pages.admin.peserta', compact('data'));
    }

    // admin detail peserta
    public function view($id)
    {
        $data = Peserta::findOrFail($id);
        $bahasa = Bahasa::where('id_peserta', '=', $id)->get();
        return view('pages.admin.detailpeserta', compact('data', 'bahasa'));
    }
}
