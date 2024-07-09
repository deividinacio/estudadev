<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
//use App\Models\Aluno;
use App\Services\AlunoService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


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
        return response() ->json([
            'success' => true,
            'data' => $alunos,
            'message' => 'Todos alunos retornados.'
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request-> validate([
            'nome_aluno' => 'required|string',
            'nro_registro' => 'required|numeric',
            'dat_inicio' => 'required|date',
            'dat_conclusao' => 'nullable|date',
            'dat_colacao_grau'=> 'nullable|date',
            'dat_expedicao_diploma' => 'nullable|date'
        ]);

        $aluno = $this->alunoService->create($data);
       
        return response() ->json([
            'success' => true,
            'data' => $aluno,
            'message' => 'Aluno inserido.'
        ], Response::HTTP_CREATED);
        
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
            'nome_aluno' => 'required|string',
            'nro_registro' => 'required|numeric',
            'dat_inicio' => 'required|date',
            'dat_conclusao' => 'nullable|date',
            'dat_colacao_grau'=> 'nullable|date',
            'dat_expedicao_diploma' => 'nullable|date'
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
