<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamientos extends Model
{
    use HasFactory;

    protected $fillable = [ 'tratamiento', 'descripcion', 'costo'];

    public function getNombreAttribute()
    {
        return $this->attributes['tratamiento'];
    }
}
