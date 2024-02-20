<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    protected $table = 'lokasi';
    protected $primaryKey = 'id_lokasi';
    protected $fillable = [
        'alamat_lokasi',
        'qr_lokasi',
        'long_lokasi',
        'lat_lokasi',
        'id_kota',
        'id_provinsi',
    ];
}
