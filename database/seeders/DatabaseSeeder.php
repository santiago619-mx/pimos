<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Factory; // importar la clase Factory
use Illuminate\Support\Facades\Hash; // Para hashear contraseñas
use Illuminate\Support\Str; // Para generar cadenas aleatorias

use App\Models\User;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Producto;
use App\Models\Sabor;
use App\Models\Inventario;
use App\Models\Pedido;
use App\Models\Venta;
use App\Models\PedidoProducto;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 🧍‍♂️ Crear clientes
        Cliente::factory(10)->create();

        // 👨‍🔧 Crear empleados
        Empleado::factory(5)->create();

        // 📦 Crear productos
        $productos = Producto::factory(20)->create();

        // 🍓 Crear sabores
        Sabor::factory(10)->create();

        // 📦 Crear inventario (ligado a productos)
        foreach ($productos as $producto) {
            Inventario::factory()->create([
                'ProductoID' => $producto->ProductoID,
            ]);
        }

        // 🛒 Crear pedidos (ligados a clientes)
        $clientes = Cliente::all();
        $pedidos = collect();

        foreach ($clientes as $cliente) {
            $numPedidos = rand(1, 3);
            for ($i = 0; $i < $numPedidos; $i++) {
                $pedidos->push(
                    Pedido::factory()->create([
                        'cliente_id' => $cliente->id,
                    ])
                );
            }
        }

        // 💰 Crear ventas (ligadas a pedidos y empleados)
        $empleados = Empleado::all();

        foreach ($pedidos as $pedido) {
            Venta::factory()->create([
                'empleado_id' => $empleados->random()->id,
                'pedido_id' => $pedido->id,
                'total' => $pedido->total,
            ]);
        }

        // 🔗 Crear relación pedido_producto
        foreach ($pedidos as $pedido) {
            $numProductos = rand(2, 5);
            $productosSeleccionados = $productos->random($numProductos);

            foreach ($productosSeleccionados as $producto) {
                PedidoProducto::factory()->create([
                    'pedido_id' => $pedido->id,
                    'producto_id' => $producto->ProductoID,
                    'cantidad' => rand(1, 5),
                    'precio_unitario' => $producto->Precio,
                ]);
            }
        }
    }
}