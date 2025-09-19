<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('precio_venta', 8, 2);
            $table->decimal('precio_compra', 8, 2);
            $table->text('descripcion')->nullable();
            $table->integer('stock');
            $table->string('imagen');
            $table->string('estado');
            $table->string('registradopor');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
