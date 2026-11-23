<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    /**
     * Campos asignables por mass assignment.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'dni',
        'nombre',
        'apellidos',
        'email',
    ];

    public static function comprobarDniLibre(string $dni): bool
    {
        // exists() devuelve un booleano directo de forma óptima sin traer los datos del registro
        $existe = self::where('dni', $dni)->exists(); // [cite: 190, 191]
        return !$existe;
    }

    public function reparaciones()
    {
        return $this->hasMany(Reparacion::class, 'clientes.id');
    }
}
