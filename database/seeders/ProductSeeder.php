<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // memasukkan data produk
        $products = [
            [
                "name" => "Laptop",
                "price" => "10000000",
                "description" => "Laptop Asus"
            ],
            [
                "name" => "Printer",
                "price" => "5000000",
                "description" => "Printer Epson"
            ],
        ];

        // loop semua product dan memasukkan ke dalam database
        foreach($products as $product) {

            // memasukkan data product ke dalam table products
            Product::create($product);
        };
    }
}
