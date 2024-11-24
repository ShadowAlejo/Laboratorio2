<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    use HasFactory;

    protected $table = 'socios'; // Nombre de la tabla

    protected $primaryKey = 'soc_id'; // Llave primaria personalizada

    public $timestamps = true; // Habilitar timestamps

    protected $fillable = [
        'soc_cedula',
        'soc_nombre',
        'soc_direccion',
        'soc_telefono',
        'soc_correo',
    ];
}