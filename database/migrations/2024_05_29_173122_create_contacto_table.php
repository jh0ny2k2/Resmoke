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
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->text('email');
            $table->string('telefono');
            $table->enum('motivo', ['consulta','problema','sugerencia','otros']);
            $table->text('comentario');
            $table->enum('comoConociste', ['ninguno','internet','amigo','redesSociales','otros']);
            $table->enum('estado', ['visto', 'pendiente']);
            $table->timestamps();
        });
    }


};
