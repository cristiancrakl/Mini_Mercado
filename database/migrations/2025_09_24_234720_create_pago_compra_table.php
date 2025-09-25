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
        Schema::create('pago_compra', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ordenCompra_id')->references('id')->on('orden_compra');
            $table->foreignId('metodoPago_id')->references('id')->on('metodo_pago');
            $table->decimal('monto', 10, 2);
            $table->string('referencia_transaccion');
            $table->string('registrado_por');
            $table->tinyInteger('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pago_compra');
    }
};
