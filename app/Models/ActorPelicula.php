<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ActorPelicula extends Model
{

    use HasFactory;

    protected $table = 'actor_pelicula'; // Especificamos el nombre de la tabla pivote

    protected $fillable = [
        'act_id', // ID del actor
        'pel_id', // ID de la película
        'actor_papel', // Papel del actor en la película
    ];

    // Relación con el modelo Actor
    public function actor()
    {
        return $this->belongsTo(Actor::class, 'act_id');
    }

    // Relación con el modelo Pelicula
    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class, 'pel_id');
    }
}
