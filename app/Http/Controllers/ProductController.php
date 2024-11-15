<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


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

        // Alert::success('Hallo', 'Halo ini adalah alert');

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
       $validation = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);
        $product = Product::create($validation);


        Alert::success('Berhasil', $product->name . ' berhasil ditambahkan');

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

        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);
        // mengubah data produk ke database
        $product->update($validation);


        // redirect user ke halaman /products
        return redirect()->route("products.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // apakah produk nya itu ada?
        $product = Product::findOrFail($id);

        // menghapus produk dari database
        $product->delete();


        // redirect user ke halaman /products
        return redirect()->route("products.index");
    }
}
