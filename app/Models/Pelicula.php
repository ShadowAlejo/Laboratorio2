<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $table = 'peliculas';

    protected $primaryKey = 'pel_id';

    protected $fillable = [
        'gen_id',
        'pel_nombre',
        'dir_id',         // Nueva relación con el director
        'for_id',         // Nueva relación con el formato
        'costo',          // Nueva columna para el costo
        'fecha_estreno',  // Nueva columna para la fecha de estreno
    ];

    // Relación con el modelo Genero
    public function genero()
    {
        return $this->belongsTo(Genero::class, 'gen_id', 'gen_id');
    }

    // Relación con el modelo Director
    public function director()
    {
        return $this->belongsTo(Director::class, 'dir_id', 'dir_id');
    }

    // Relación con el modelo Formato
    public function formato()
    {
        return $this->belongsTo(Formato::class, 'for_id', 'for_id');
    }

    // Relación con el modelo Actor
    public function actores()
    {
        return $this->belongsToMany(Actor::class, 'actor_pelicula', 'pel_id', 'act_id');
    }
}

