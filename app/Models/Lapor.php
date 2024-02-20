<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapor extends Model
{
    use HasFactory;
    protected $table = 'lapor';
    protected $primaryKey = 'id_lapor';
    protected $fillable = [
        'nama_lapor',
        'no_hp_lapor',
        'id_lokasi',
        'jenis_laporan',
        'tanggal_lapor'
    ];
}
