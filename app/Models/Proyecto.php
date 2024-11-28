<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}

class Proyecto extends Model
{
    use HasFactory;

    // Especificar la tabla si el nombre no es plural de la clase
    protected $table = 'proyectos'; // Opcional, pero recomendado

    // Especificar la clave primaria
    protected $primaryKey = 'idProyecto'; // Aquí especificas tu clave primaria

    // Si tu clave primaria es incremental
    public $incrementing = true;

    protected $fillable = [
        'nombreProyecto',
        'descripcionProyecto',
        'responsable',
        'fechaInicio',
        'fechaFin',
    ];
}
