<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $table = 'actores';

    protected $primaryKey = 'act_id';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'act_nombre',
        'sex_id',
    ];

    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'sex_id', 'sex_id');
    }


}
