<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representante;
use Exception;

class RepresentanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $representantes = Representante::with('cidade')->get();
            return response()->json($representantes, 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao listar representantes: ' . $e->getMessage()], 500);
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
                'cidade_id' => 'required|exists:cidades,id',
            ]);

            $representante = Representante::create($validatedData);
            return response()->json($representante, 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao criar representante: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $representante = Representante::with('cidade')->findOrFail($id);
            return response()->json($representante, 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao exibir representante: ' . $e->getMessage()], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $representante = Representante::findOrFail($id);

            $validatedData = $request->validate([
                'nome' => 'string|max:255',
                'cidade_id' => 'exists:cidades,id',
            ]);

            $representante->update($validatedData);
            return response()->json($representante, 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar representante: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $representante = Representante::findOrFail($id);
            $representante->delete();
            return response()->json(null, 204);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao deletar representante: ' . $e->getMessage()], 500);
        }
    }
}
