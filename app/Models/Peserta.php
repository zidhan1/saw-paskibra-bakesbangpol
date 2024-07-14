<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $table = 'peserta';
    protected $fillable = [
        "profilepath",
        "id_user",
        "nama_lengkap",
        "nama_panggilan",
        "jenis_kelamin",
        "alamat",
        "tempat_lahir",
        "tanggal_lahir",
        "agama",
        "bahasa",
        "bb",
        "no_hp",
        "tb",
        "asal_sekolah",
        "alamat_sekolah",
        "email_sekolah",
        "nama_ayah",
        "pekerjaan_ayah",
        "no_hp_ayah",
        "nama_ibu",
        "pekerjaan_ibu",
        "no_hp_ibu",
        "tahun_daftar",
        "options"
    ];
}
