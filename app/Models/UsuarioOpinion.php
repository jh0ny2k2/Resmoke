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

    public function usuarios()
    {
        return $this->belongsTo(User::class, 'usuarioId');
    }

    public function vendedores()
    {
        return $this->belongsTo(User::class, 'vendedorId');
    }

}
