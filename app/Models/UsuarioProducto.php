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

    public function productos()
    {
        return $this->belongsTo(Producto::class);
    }

    public function usuarios()
    {
        return $this->belongsTo(User::class);
    }
}
