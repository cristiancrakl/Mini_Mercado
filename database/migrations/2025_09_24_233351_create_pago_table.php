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
        Schema::create('pago', function (Blueprint $table) {
            $table->id();
            $table->foreignId('factura_id')->references('id')->on('factura');
            $table->foreignId('metodoPago_id')->references('id')->on('metodo_pago');
            $table->decimal('monto', 10, 2);
            $table->string('registrado_por');
            $table->tinyInteger('estado');
            $table->string('referencia_transaccion')->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pago');
    }
};
