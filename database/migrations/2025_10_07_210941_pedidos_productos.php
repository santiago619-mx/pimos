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
        Schema::create('pedidos_productos', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('pedido_id');
        $table->unsignedBigInteger('producto_id');
        $table->integer('cantidad');
        $table->decimal('precio_unitario', 8, 2);
        $table->timestamps();

        $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
        $table->foreign('producto_id')->references('ProductoID')->on('productos')->onDelete('cascade');
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
