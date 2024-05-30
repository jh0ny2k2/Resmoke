<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioProducto extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuarioId', 
        'productoId', 
    ];

    // Relación uno a muchos con la tabla usuarios
    public function productos()
    {
        return $this->belongsTo(Producto::class, 'productoId');
    }

    // Relación uno a muchos con la tabla productos
    public function usuarios()
    {
        return $this->belongsTo(User::class, 'usuarioId');
    }
}
