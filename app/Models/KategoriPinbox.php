<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPinbox extends Model
{
    use HasFactory;
    protected $table = 'kategori_pinbox';
    protected $primaryKey = 'id_kategori_pinbox';
    protected $fillable = [
        'nama_kategori_pinbox',
        'ukuran_kategori_pinbox',
    ];
}
