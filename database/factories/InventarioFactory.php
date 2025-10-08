<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventario>
 */
class InventarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    return [
        'ProductoID' => Producto::factory(),
        'Cantidad' => $this->faker->numberBetween(1, 100),
        'FechaActualizacion' => $this->faker->date(),
        'Notas' => $this->faker->sentence(),
        ];
    }
}
