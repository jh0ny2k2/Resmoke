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

    public function usuarios()
    {
        return $this->belongsToMany(User::class);
    }

    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'categoriaId');
    }

    public function opiniones()
    {
        return $this->hasMany(UsuarioOpinion::class);
    }

    public function productos() 
    {
        return $this->belongsToMany(UsuarioProducto::class);
    }

    
}
