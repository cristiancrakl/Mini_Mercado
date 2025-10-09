<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\OrdenCompra;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetalleCompra>
 */
class DetalleCompraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'producto_id' => Producto::factory(),
            'ordenCompras_id' => OrdenCompra::factory(),
            'cantidad' => $this->faker->randomFloat(2, 1, 100),
            'sub_total' => $this->faker->randomFloat(2, 0, 1000),
            'iva' => $this->faker->randomFloat(2, 0, 100),
            'registrado_por' => $this->faker->name(),
        ];
    }
}