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
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id('id_detalle_venta');
            $table->unsignedBigInteger('id_venta');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedInteger('cantidad');
            $table->decimal('precio_venta', 10, 2)->unsigned();
            $table->decimal('descuento', 10, 2)->unsigned();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_venta')
                  ->references('id_venta')
                  ->on('venta')
                  ->onDelete('NO ACTION')
                  ->onUpdate('NO ACTION');

            $table->foreign('id_producto')
                  ->references('id_producto')
                  ->on('producto')
                  ->onDelete('NO ACTION')
                  ->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_venta');
    }
};
