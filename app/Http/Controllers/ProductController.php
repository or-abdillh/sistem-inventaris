<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // mengambil data produk
        $products = Product::all();

        // menampilkan view product/index
        return view("product/index", [
            "products" => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("product.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // membuat produk baru
        Product::create($request->all());

        // redirect user ke halaman /products
        return redirect()->route("products.index");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // mengambil data produk menggunakan id
        $product = Product::findOrFail($id);

        return view("product.show", [
            "product" => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //PUT
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // apakah produk nya itu ada?
        $product = Product::findOrFail($id);

        // mengubah data produk ke database
        $product->update($request->all());

        // redirect user ke halaman /products
        return redirect()->route("products.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
