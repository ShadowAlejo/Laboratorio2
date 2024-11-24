<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    use HasFactory;

    protected $table = 'sexos'; // Nombre de la tabla

    protected $primaryKey = 'sex_id'; // Clave primaria personalizada

    public $incrementing = true; // Indica si la clave primaria se incrementa automáticamente

    protected $keyType = 'int'; // Tipo de la clave primaria

    protected $fillable = [
        'sex_nombre', // Campos rellenables
    ];
}
