<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formato extends Model
{
    use HasFactory;

    protected $table = 'formatos';
    protected $primaryKey = 'for_id';

    protected $fillable = [
        'for_nombre',
    ];
}
