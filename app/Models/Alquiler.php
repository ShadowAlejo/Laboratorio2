<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    use HasFactory;

    // Especificamos el nombre de la tabla
    protected $table = 'alquileres';

    // Especificamos la clave primaria si es diferente a 'id'
    protected $primaryKey = 'id';

    // Definimos qué campos son asignables en masa
    protected $fillable = [
        'soc_id',            // ID del socio
        'pel_id',            // ID de la película
        'fecha_alquiler_inicio',  // Fecha de inicio del alquiler
        'fecha_alquiler_final',   // Fecha de fin del alquiler
        'valor_alquiler',    // Valor del alquiler
        'fecha_entrega',     // Fecha de entrega
    ];

    // Relación con el modelo Socio (un alquiler pertenece a un socio)
    public function socio()
    {
        return $this->belongsTo(Socio::class, 'soc_id', 'soc_id');
    }

    // Relación con el modelo Pelicula (un alquiler pertenece a una película)
    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class, 'pel_id', 'pel_id');
    }
}
