<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrdenCompra>
 */
class OrdenCompraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'proveedores_id' => Proveedor::factory(),
            'numero_orden' => $this->faker->unique()->numberBetween(1000, 9999),
            'estado' => $this->faker->numberBetween(0, 1),
            'registrado_por' => $this->faker->name(),
            'total' => $this->faker->randomFloat(2, 0, 10000),
        ];
    }
}