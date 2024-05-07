<?php

namespace App;

use App\Models\Nilai;
use App\Models\Peserta;
use Illuminate\Database\Eloquent\Model;

class Helper extends Model
{
    public static function nilai($id_peserta, $id_kriteria)
    {
        $data = Nilai::where('id_peserta', $id_peserta)->where('id_kriteria', $id_kriteria)->orderBy('nilai', 'ASC')->get();
        foreach ($data as $key => $value) {
            return $value->nilai;
        }
    }
}
