<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    protected $fillable = [
        'cliente_id',
        'fecha',
        'hora',
        'costo',
        'tratamiento_id',
    ];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function tratamiento()
    {
        return $this->belongsTo(Tratamientos::class);
    }
}
