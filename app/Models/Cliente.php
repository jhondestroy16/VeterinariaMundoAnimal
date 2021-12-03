<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'direccion',
        'contrasenia',
        'telefono',
        // 'tipo_usuario'
    ];
}