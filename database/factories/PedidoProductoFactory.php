<?php

namespace Database\Factories;
use App\Models\Producto; // <- IMPORTANTE
use App\Models\pedido; // <- IMPORTANTE
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PedidoProducto>
 */
class PedidoProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    return [
        'pedido_id' => Pedido::factory(),
        'producto_id' => Producto::factory(),
        'cantidad' => $this->faker->numberBetween(1, 10),
        'precio_unitario' => $this->faker->randomFloat(2, 10, 500),
        ];
    }
}
