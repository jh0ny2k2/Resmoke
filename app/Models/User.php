<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'genero',
        'fechaNacimiento',
        'telefono',
        'dni',
        'password',
        'fotoPerfil',
        'rol',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relación uno a muchos con la tabla productos
    public function producto()
    {
        return $this->belongsToMany(Producto::class);
    }

    // Relación uno a muchos con la tabla opiniones
    public function productos()
    {
        return $this->belongsToMany(UsuarioProducto::class);
    }

    // Relación uno a muchos con la tabla opiniones
    public function opinion()
    {
        return $this->hasMany(UsuarioOpinion::class);
    }

    // Relación uno a muchos con la tabla favoritos
    public function favorito()  
    {
        return $this->belongsToMany(UsuarioFavorito::class);
    }
}
