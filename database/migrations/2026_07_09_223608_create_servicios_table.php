<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('vehiculo_id')
                ->constrained('vehiculos')
                ->onDelete('cascade');

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->date('fecha_ingreso');
            $table->date('fecha_salida')->nullable();
            $table->text('diagnostico');
            $table->text('trabajo_realizado')->nullable();
            $table->decimal('costo_mano_obra', 10, 2);
            $table->enum('estado', [
                'Pendiente',
                'En proceso',
                'Finalizado'
            ]);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};