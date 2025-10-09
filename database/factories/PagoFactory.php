<?php

namespace Database\Factories;

use App\Models\Factura;
use App\Models\MetodoPago;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pago>
 */
class PagoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'facturas_id' => Factura::factory(),
            'metodoPagos_id' => MetodoPago::factory(),
            'monto' => $this->faker->randomFloat(2, 0, 10000),
            'registrado_por' => $this->faker->name(),
            'estado' => $this->faker->numberBetween(0, 1),
            'referencia_transaccion' => $this->faker->optional()->uuid(),
            'observaciones' => $this->faker->optional()->sentence(),
        ];
    }
}