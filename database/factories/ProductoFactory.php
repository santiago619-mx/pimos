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
        'Nombre' => $this->faker->word(),
        'Descripcion' => $this->faker->sentence(),
        'Precio' => $this->faker->randomFloat(2, 10, 500),
        'Categoria' => $this->faker->randomElement(['Bebidas', 'Snacks', 'Postres']),
        ];
    }
}
