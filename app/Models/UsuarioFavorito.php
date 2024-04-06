<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioFavorito extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuarioId', 
        'productoId', 
    ];
}
