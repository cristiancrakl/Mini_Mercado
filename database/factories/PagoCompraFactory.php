<?php

namespace Database\Factories;

use App\Models\OrdenCompra;
use App\Models\MetodoPago;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PagoCompra>
 */
class PagoCompraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ordenCompras_id' => OrdenCompra::factory(),
            'metodoPagos_id' => MetodoPago::factory(),
            'monto' => $this->faker->randomFloat(2, 0, 10000),
            'referencia_transaccion' => $this->faker->uuid(),
            'registrado_por' => $this->faker->name(),
            'estado' => $this->faker->numberBetween(0, 1),
        ];
    }
}