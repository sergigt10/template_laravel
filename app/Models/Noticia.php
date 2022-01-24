<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen_1',
        'imagen_2',
        'imagen_3',
        'imagen_4',
        'video'
    ];
}
