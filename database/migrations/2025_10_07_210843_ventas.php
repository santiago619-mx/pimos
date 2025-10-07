<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('empleado_id');
        $table->unsignedBigInteger('pedido_id');
        $table->date('fecha');
        $table->decimal('total', 10, 2);
        $table->timestamps();

        $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');
        $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
