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
            $table->text('comentario');
            $table->enum('estado', ['visto', 'pendiente']);
            $table->timestamps();
        });
    }


};
