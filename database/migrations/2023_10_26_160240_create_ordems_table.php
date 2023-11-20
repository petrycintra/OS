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
        Schema::create('ordems', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tipo')->nullable();
            $table->string('equipamento')->nullable();
            $table->string('servico');
            $table->string('descricao')->nullable();
            $table->float('valor')->nullable();
            $table->string('prazo');
            $table->string('status');
            $table->string('responsavel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordems');
    }
};
