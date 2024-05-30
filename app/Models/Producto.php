<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 
        'categoria', 
        'precio',
        'estado',
        'descripcion', 
        'imagen', 
        'localizacion',
        'numeroVisto',
    ];

    // Relación uno a muchos con la tabla usuarios
    public function usuarios()
    {
        return $this->belongsToMany(User::class);
    }

    // Relación uno a muchos con la tabla categorias
    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'categoriaId');
    }

    // Relación uno a muchos con la tabla opiniones
    public function opiniones()
    {
        return $this->hasMany(UsuarioOpinion::class);
    }

    // Relación uno a muchos con la tabla productos
    public function productos() 
    {
        return $this->belongsToMany(UsuarioProducto::class);
    }

    
}
