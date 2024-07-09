<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;
    
    protected $fillable = ['nome_aluno', 
    'nro_registro', 
    'dat_inicio', 
    'dat_conclusao', 
    'dat_colacao_grau', 
    'dat_expedicao_diploma'];
}
