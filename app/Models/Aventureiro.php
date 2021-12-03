<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aventureiro extends Model
{
    protected $table = 'aventureiros';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome',
        'raca',
        'idade',
        'classe',
        'nivel',
    ];
}
