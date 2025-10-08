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
        Schema::create('inventarios', function (Blueprint $table) {
        $table->id('InventarioID');
        $table->unsignedBigInteger('ProductoID');
        $table->integer('Cantidad');
        $table->date('FechaActualizacion');
        $table->text('Notas')->nullable();
        $table->timestamps();

        $table->foreign('ProductoID')->references('ProductoID')->on('productos')->onDelete('cascade');
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
