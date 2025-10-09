<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factura>
 */
class FacturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cliente_id' => Cliente::factory(),
            'total' => $this->faker->randomFloat(2, 100, 10000),
            'iva' => $this->faker->randomFloat(2, 0, 100),
            'saldo_pendiente' => $this->faker->randomFloat(2, 0, 1000),
            'tipo_pago' => $this->faker->boolean(),
            'descuento' => $this->faker->randomFloat(2, 0, 50),
            'registrado_por' => $this->faker->name(),
            'estado' => 1,
        ];
    }
}
