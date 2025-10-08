<?php

namespace Database\Factories;

use App\Models\Cliente; // <- IMPORTANTE
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
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
        'fecha' => $this->faker->date(),
        'total' => $this->faker->randomFloat(2, 50, 1000),
        ];
    }
}
