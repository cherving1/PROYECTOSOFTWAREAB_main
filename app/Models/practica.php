<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'idestudiante',
        'iddocente',
        'idempresa',
        'idetapa',
        'titulo',
    ];
}
