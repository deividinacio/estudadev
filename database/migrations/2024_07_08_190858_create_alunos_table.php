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
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_aluno');
            $table->integer('nro_registro');
            $table->date('dat_inicio'); // data que o aluno iniciou suas atividades 
            $table->date('dat_conclusao'); // data que o aluno concluiu o curso
            $table->date('dat_colacao_grau'); 
            $table->date('dat_expedicao_diploma'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
