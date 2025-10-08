<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Empleado; // <- IMPORTANTE
use App\Models\Pedido; // <- IMPORTANTE
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venta>
 */
class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'empleado_id' => Empleado::factory(),
        'pedido_id' => Pedido::factory(),
        'fecha' => $this->faker->date(),
        'total' => $this->faker->randomFloat(2, 50, 1000),
        ];
    }
}
