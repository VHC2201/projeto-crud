<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // GET: Lista todos os fornecedores
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    // GET: Mostra o formulário de criação
    public function create()
    {
        return view('suppliers.create');
    }

    // POST: Salva o novo fornecedor no banco
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email',
        ]);

        Supplier::create($request->all());
        return redirect()->route('suppliers.index')->with('success', 'Fornecedor criado com sucesso!');
    }

    // GET: Mostra o formulário de edição
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    // PUT/PATCH: Atualiza o fornecedor no banco
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email,' . $supplier->id,
        ]);

        $supplier->update($request->all());
        return redirect()->route('suppliers.index')->with('success', 'Fornecedor atualizado!');
    }

    // DELETE: Remove do banco
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Fornecedor excluído!');
    }
}