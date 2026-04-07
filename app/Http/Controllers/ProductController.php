<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
    
        $products = Product::with('supplier')->get();
        return view('products.index', compact('products'));
    }

  
    public function create()
    {
 
        $suppliers = Supplier::orderBy('name')->get(); 
        
        return view('products.create', compact('suppliers'));
    }

  
    public function store(Request $request)
    {
     
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'supplier_id' => 'required|exists:suppliers,id', 
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Produto cadastrado com sucesso!');
    }
    
   
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produto excluído!');
    }
}