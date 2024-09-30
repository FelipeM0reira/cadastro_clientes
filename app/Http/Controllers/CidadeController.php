<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use Exception;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $cidades = Cidade::all();
            return response()->json($cidades, 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao listar cidades: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nome' => 'required|string|max:255',
            ]);

            $cidade = Cidade::create($validatedData);
            return response()->json($cidade, 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao criar cidade: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $cidade = Cidade::findOrFail($id);
            return response()->json($cidade, 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao exibir cidade: ' . $e->getMessage()], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $cidade = Cidade::findOrFail($id);

            $validatedData = $request->validate([
                'nome' => 'string|max:255',
            ]);

            $cidade->update($validatedData);
            return response()->json($cidade, 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar cidade: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $cidade = Cidade::findOrFail($id);
            $cidade->delete();
            return response()->json(null, 204);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao deletar cidade: ' . $e->getMessage()], 500);
        }
    }
}
