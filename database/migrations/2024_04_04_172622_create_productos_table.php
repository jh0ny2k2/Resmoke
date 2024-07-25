<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('categoriaId');
            $table->foreign('categoriaId')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
            $table->double('precio');
            $table->double('nuevoPrecio')->nullable();
            $table->enum('estado', ['observacion', 'activo', 'vendido', 'reservado', 'denegado','oculto']);
            $table->text('descripcion');
            $table->string('localizacion');
            $table->integer('numeroVisto');
            $table->integer('numeroFavorito');
            $table->unsignedBigInteger('vendidoPor')->nullable();
            $table->foreign('vendidoPor')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->enum('promoción', ['si', 'no']);
            $table->timestamps();
        });

    }

};
