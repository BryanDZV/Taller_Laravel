<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mecanico extends Model
{
    use HasFactory;

    /**
     * Atributos asignables (Mass Assignment).
     */
    protected $fillable = [
        'user_id',
        'dni',
        'especialidad',
    ];

    /**
     * Atributos ocultos en serialización (JSON/API).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversión de tipos automática.
     */
    protected $casts = [
        'fecha_publicacion' => 'datetime',

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reparacions()
    {
        return $this->hasMany(Reparacion::class, 'mecanico.id');
    }
}
