<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aluno;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alunos')-> insert([
            'nome_aluno'=> 'Aluno Teste1',
            'nro_registro' => random_int(1,1000), // apenas para teste 
            'dat_inicio' => Carbon::createFromFormat('d/m/Y' ,'01/02/2023') ,
            'dat_conclusao'=> Carbon::createFromFormat('d/m/Y' ,'01/02/2025'),
            'dat_colacao_grau'=> Carbon::createFromFormat('d/m/Y' ,'03/03/2025'),
            'dat_expedicao_diploma'=>Carbon::createFromFormat('d/m/Y' ,'20/04/2025')
        ]);
    }
}
