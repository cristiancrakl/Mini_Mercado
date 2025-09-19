<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('factura_id')->constrained('facturas')
                ->onDelete('cascade');
            $table->date('fechapago');
            $table->decimal('monto', 10, 2);
            $table->foreignId('metodopago_id')->constrained('metodopagos')
                ->onDelete('restrict');
            $table->string('estado');
            $table->string('registradopor');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
