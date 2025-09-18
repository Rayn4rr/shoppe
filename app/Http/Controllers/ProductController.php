<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::all();
        return response()->json(['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product = product::create($request->all());
        return response()->json(['products' => $product]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = product::find($id);

        if ($product) {
            return response()->json(['product']);
        } else {
            return response()->json(['message' => 'produk tidak ditemukan'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
        $product = product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }
        $product->update($validatedData);
        return response()->json(['message' => 'produk berhasil diupdate', 'product' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = product::find($id);

        if (!$product) {
            return response()->json(['message' => 'produk tidak ditemukan'],404);
        }
        $product->delete();
        return response()->json(['message' => 'produk berhasil dihapus']);
    }
}
