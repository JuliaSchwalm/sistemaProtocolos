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
        Schema::create('cadastros', function (Blueprint $table) {
            $table->id();
            $table->string('nome') ->nullable();
            $table->string('cpf-cnpj') ->unique();
            $table->string('senha'); 
            $table->string('email') ->nullable();
            $table->bigInteger('telefone') ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadastros');
    }
};
