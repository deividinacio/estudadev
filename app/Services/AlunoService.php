<?php

namespace App\Services;

use App\Interface\AlunoRepositoryInterface;
use App\Repository\AlunoRepository;

class AlunoService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected AlunoRepositoryInterface $alunoRepository)
    {
        
    }
    public function all()
    {
        return $this->alunoRepository-> all();
    }

    public function create(array $data)
    {
      return $this-> alunoRepository -> create($data);
    }
   
    public function find(int $id)
    {
        return $this->alunoRepository-> find($id);
    }

    public function update(array $data, int $id)
    {
      return $this-> alunoRepository -> update($data, $id);
    }

    public function delete(int $id)
    {
        return $this->alunoRepository-> delete($id);
    }
   

}
