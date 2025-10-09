<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'nombre' => $this->faker->name(),
            'direccion' => $this->faker->address(),
            'tipo_documento' => $this->faker->word(),
            'numero_documento' => $this->faker->unique()->numberBetween(1000000, 9999999),
            'telefono' => $this->faker->unique()->numberBetween(3000000, 4000000),
            'email' => $this->faker->safeEmail(),
            'estado' => 1,
            'registrado_por' => $this->faker->name(),



        ];
    }
}
