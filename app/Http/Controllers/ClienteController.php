<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Exception;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $clientes = Cliente::with('cidade')->get();
            return response()->json($clientes, 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao listar clientes: ' . $e->getMessage()], 500);
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

            $cliente = Cliente::create($validatedData);
            return response()->json($cliente, 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao criar cliente: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $cliente = Cliente::with('cidade')->findOrFail($id);
            return response()->json($cliente, 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao exibir cliente: ' . $e->getMessage()], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $cliente = Cliente::findOrFail($id);

            $validatedData = $request->validate([
                'nome' => 'string|max:255',
                'cidade_id' => 'exists:cidades,id',
            ]);

            $cliente->update($validatedData);
            return response()->json($cliente, 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar cliente: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();
            return response()->json(null, 204);
        } catch (Exception $e) {
            return response()->json(['error' => 'Erro ao deletar cliente: ' . $e->getMessage()], 500);
        }
    }
}
