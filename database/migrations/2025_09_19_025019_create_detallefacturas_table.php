<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallefacturasTable extends Migration
{
    public function up()
    {
        Schema::create('detallefacturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('factura_id');
            $table->unsignedBigInteger('producto_id');
            //$table->foreignId('producto_id')->constrained(); Nueva forma 
            //$table->foreignId('factura_id')->constrained(); Nueva forma 
            $table->integer('cantidad');
            $table->decimal('subtotal', 10, 2);
            $table->foreign('factura_id')->references('id')->on('facturas')
                ->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->string('registradopor');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detallefacturas');
    }
}
