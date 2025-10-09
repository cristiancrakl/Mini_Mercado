<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' =>  $this->faker->word(),
            'precio_compra' => $this->faker->randomFloat(2, 100, 500),
            'precio_venta' => $this->faker->randomFloat(2, 100, 500),
            'descripcion' => $this->faker->sentence(),
            'unidad_medida' => $this->faker->numberBetween(1, 100),
            'stock' => '2',
            'stock_minimo' => '1',
            'imagen' => $this->faker->imageUrl(),
            'estado' => '1',
            'registrado_por' =>  $this->faker->name()
        ];
    }
}
