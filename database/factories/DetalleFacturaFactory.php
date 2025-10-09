<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\Factura;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetalleFactura>
 */
class DetalleFacturaFactory extends Factory
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
            'factura_id' => Factura::factory(),
            'cantidad' => $this->faker->randomFloat(2, 100, 500),
            'sub_total' => $this->faker->randomFloat(2, 100, 500),
            'registrado_por' => $this->faker->name()
        ];
    }
}
