<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seleksi extends Model
{
    use HasFactory;

    protected $table = 'seleksi';
    protected $fillable = [
        'nama',
        'tanggal_mulai',
        'tanggal_selesai',
        'keterangan'
    ];
}
