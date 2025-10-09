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
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->references('id')->on('productos');
            $table->foreignId('ordenCompras_id')->references('id')->on('orden_compras');
            $table->decimal('cantidad', 10, 2);
            $table->decimal('sub_total', 10, 2);
            $table->decimal('iva', 10, 2);
            $table->string('registrado_por');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_compras');
    }
};