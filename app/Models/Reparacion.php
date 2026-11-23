<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparacion extends Model
{
    use HasFactory;

    /**
     * Atributos asignables (Mass Assignment).
     */
    protected $fillable = [
        'fecha_entrada',
        'descripcion',
        'importe',
        'mecanico_id',
        'cliente_id',

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
        'es_activo' => 'boolean',
        'precio' => 'decimal:2',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
    public function mecanico()
    {
        return $this->belongsTo(Mecanico::class, 'mecanico_id');
    }
}
