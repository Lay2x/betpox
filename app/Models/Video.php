<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'video';
    protected $primaryKey = 'id_video';
    protected $fillable = [
        'judul_video',
        'link_video',
    ];
}
