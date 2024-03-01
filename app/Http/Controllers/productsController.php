<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class ProductsController extends Controller
{
    public function index()
    {
        $products = products::all();

        return response()->json($products);
    }

    public function findById($id)
    {
        $products = products::find($id);

        if (!$products) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        return response()->json($products);
    }

    public function search(Request $request) {
        $request -> validate([
            'dato' => 'required|string',
        ]);

        $dato = $request->input('dato');

        $products = products::where('name', 'like', "%$dato%") -> orWhere('description', 'like', "%$dato%") -> get();
    
        return response()->json($products);
    }
}
