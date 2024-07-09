<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
//use App\Models\Aluno;
use App\Services\AlunoService;
use Illuminate\Http\Request;

class AlunoControler extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(protected AlunoService $alunoService)
    {
        
    }


    public function index()
    {
        $alunos = $this->alunoService->all();
        return json_encode($alunos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request-> validate([
            'nome_aluno' => 'required|string',
            'nro_registro' => 'required|numeric',
            'dat_inicio' => 'required|date'

            // colocar os outros campos
        ]);

        $aluno = $this->alunoService->create($data);
        return json_encode($aluno);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $aluno = $this->alunoService->find($id);
        return json_encode($aluno);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $data = $request-> validate([
            'nome_aluno' => 'required|string'
            // colocar os outros campos
        ]);

        $aluno = $this-> alunoService->update($data, $id);
        return json_encode($aluno);
    }

    /**
     * Remove the specified resource from storage.
     */
    
     public function destroy(int $id)
    {
        $this->alunoService->delete($id);
    }
       
}
