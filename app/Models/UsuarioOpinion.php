<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioOpinion extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuarioId', 
        'vendedorId', 
        'estrellas',
        'opition',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'UsuarioId');
    }

    public function vendedor()
    {
        return $this->hasMany(User::class, 'UsuarioId');
    }

}
