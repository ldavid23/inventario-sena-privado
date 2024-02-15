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
        Schema::create('distribucions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('funcionario_id')
            ->constrained('funcionarios')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('mes');
            $table->integer('contratos');
            $table->integer('alternativas');
            $table->integer('total');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribucions');
    }
};
