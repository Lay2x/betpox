<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;
    protected $table = 'testimoni';
    protected $primaryKey = 'id_testimoni';
    protected $fillable = [
        'instansi_testimoni',
        'isi_testimoni',
        'logo_instansi_testimoni',
    ];
}
