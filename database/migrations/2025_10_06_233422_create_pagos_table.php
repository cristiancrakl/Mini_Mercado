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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('facturas_id')->references('id')->on('facturas');
            $table->foreignId('metodoPagos_id')->references('id')->on('metodo_pagos');
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
        Schema::dropIfExists('pagos');
    }
};
