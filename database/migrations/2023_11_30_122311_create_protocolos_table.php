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
        Schema::create('protocolos', function (Blueprint $table) {
            $table->id();
            $table->string('endereco'); 
            $table->string('assunto'); 
            $table->string('setor');
            $table->string('descricao'); 
            $table->unsignedBigInteger('id_requerente');
            $table->foreign('id_requerente')
            ->references('id')
            ->on('cadastros');
            $table->string('situacao')->default('analise');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('protocolos');
    }
};
