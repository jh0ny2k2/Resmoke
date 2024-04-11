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
            $table->string('nombre');
            $table->unsignedBigInteger('categoriaId');
            $table->foreign('categoriaId')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
            $table->double('precio');
            $table->enum('estado', ['observacion', 'activo', 'vendido', 'reservado']);
            $table->text('descripcion');
            $table->string('imagen')->nullable();
            $table->string('localizacion');
            $table->integer('numeroVisto');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
