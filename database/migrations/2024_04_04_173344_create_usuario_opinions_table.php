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
        Schema::create('usuario_opinions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuarioId');
            $table->foreign('usuarioId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('vendedorId');
            $table->foreign('vendedorId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->text('opinion');
            $table->enum('estado', ['activo', 'revision', 'denegado']);
            $table->timestamps();
        });
    }

};
