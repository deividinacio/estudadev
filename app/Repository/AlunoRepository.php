<?php

namespace App\Repository;

use App\Interface\AlunoRepositoryInterface;
use App\Models\Aluno;

class AlunoRepository implements AlunoRepositoryInterface
{
   
    public function all (){
        return Aluno::all();
    }

    public function find(int $id){
        return Aluno::findOrFail($id);
    }

    public function create(array $data)
    {
        return Aluno::create($data);
    }

    public function update(array $data, int $id)
    {
        return Aluno::findOrFail($id)-> update($data);
    }

    public function delete(int $id) {
        Aluno::findOrFail($id)-> delete();
    }
}
