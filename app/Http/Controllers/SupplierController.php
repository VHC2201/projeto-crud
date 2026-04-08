<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }


    public function create()
    {
        return view('suppliers.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email',
            'cep' => 'nullable|string|max:9',
            'street' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:20',
            'neighborhood' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|size:2',
        ]);

        Supplier::create($request->all());
        return redirect()->route('suppliers.index')->with('success', 'Fornecedor criado com sucesso!');
    }

       public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

  
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email,' . $supplier->id,
            'cep' => 'nullable|string|max:9',
            'street' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:20',
            'neighborhood' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|size:2',
        ]);

        $supplier->update($request->all());
        return redirect()->route('suppliers.index')->with('success', 'Fornecedor atualizado!');
    }


    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Fornecedor excluído!');
    }
}