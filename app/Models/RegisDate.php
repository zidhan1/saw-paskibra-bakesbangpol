<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisDate extends Model
{
    use HasFactory;
    protected $table = 'regisdate';
    protected $fillable = ['startdate', 'enddate', 'id_berkas'];
}
