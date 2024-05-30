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

    // Relación uno a muchos con la tabla usuarios
    public function usuarios()
    {
        return $this->belongsTo(User::class, 'usuarioId');
    }

    // Relación uno a muchos con la tabla productos
    public function productos()
    {
        return $this->belongsTo(Producto::class, 'productoId');
    }
}
