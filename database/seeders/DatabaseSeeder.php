<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Producto;
use Illuminate\Database\Seeder;

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

        $producto = new Producto();

        $producto->id_categoria = "1";
        $producto->codigo = "1";
        $producto->nombre = "Seeder Funcional";
        $producto->stock = "10";
        $producto->descripcion = "seeder";
        $producto->imagen = "";
        $producto-> estado = "Activo";

        $producto->save();
    }
}
