<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    
        $totalSuppliers = Supplier::count();
        $totalProducts = Product::count();

        return view('dashboard', compact('totalSuppliers', 'totalProducts'));
    }
}