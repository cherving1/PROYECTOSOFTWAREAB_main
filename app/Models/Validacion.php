<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Validacion extends Model
{
    use HasFactory;
    protected $table = 'validaciones'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'idProyecto',
        'estadoValidacion',
        'observaciones',
        'fechaValidacion',
    ];

    // Relación inversa con Proyecto
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'idProyecto');
    }
}
