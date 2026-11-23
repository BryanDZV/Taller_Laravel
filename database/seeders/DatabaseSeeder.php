<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cliente;
use App\Models\Mecanico;
use App\Models\Reparacion;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //usuarios fijos

        // 1. Crear Usuario Administrador
        User::create([
            'login' => 'admin',
            'name' => 'Carlos Admin',
            'password' => Hash::make('admin123'),
            'role' => 'administrador',
        ]);

        // 2. Crear Usuario Administrativo
        User::create([
            'login' => 'recep1',
            'name' => 'Laura Recepción',
            'password' => Hash::make('recep123'),
            'role' => 'administrativo',
        ]);

        // 3. Crear Usuario Mecánico (Guardamos la instancia para obtener su ID)
        $userMecanico = User::create([
            'login' => 'meca1',
            'name' => 'Juan Mecánico',
            'password' => Hash::make('meca123'),
            'role' => 'mecanico',
        ]);

        // 4. Crear Perfil del Mecánico (Relación 1:1 vinculada mediante user_id)
        $mecanico = Mecanico::create([
            'user_id' => $userMecanico->id,
            'dni' => '12345678A',
            'especialidad' => 'Baterías',
        ]);

        //usuarios factory
        Cliente::factory(15)->create();

        //5. añadir reparacion (usando el mecanico correcto y clientes ya creados)

        Reparacion::create([
            'fecha_entrada' => now(),
            'descripcion' => '...',
            'importe' => 100,
            'mecanico_id' => $mecanico->id,
            'cliente_id' => Cliente::inRandomOrder()->value('id'),
        ]);
        Reparacion::create([
            'fecha_entrada' => now(),
            'descripcion' => '...',
            'importe' => 500,
            'mecanico_id' => $mecanico->id,
            'cliente_id' => Cliente::inRandomOrder()->value('id'),
        ]);
        Reparacion::create([
            'fecha_entrada' => now(),
            'descripcion' => '...',
            'importe' => 145,
            'mecanico_id' => $mecanico->id,
            'cliente_id' => Cliente::inRandomOrder()->value('id'),
        ]);
    }
}
