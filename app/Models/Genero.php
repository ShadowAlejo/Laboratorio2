<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    protected $table = 'generos';

    protected $primaryKey = 'gen_id';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'gen_nombre',
    ];
}
