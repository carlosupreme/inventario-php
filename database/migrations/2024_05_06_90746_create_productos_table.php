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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_barras')->unique();
            $table->foreignId('categoria_id')->constrained();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->decimal('costo', 10)->nullable();
            $table->decimal('precio', 10);
            $table->decimal('precio_mayoreo', 10)->nullable();
            $table->integer('cantidad_mayoreo')->nullable();
            $table->string('unidad_medida');
            $table->integer('stock_minimo');
            $table->integer('stock_tienda');
            $table->integer('stock_bodega');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
