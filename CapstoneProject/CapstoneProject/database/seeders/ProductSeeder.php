<?php

namespace Database\Seeders;

use App\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    // public function run(): void
    // {
    //     $product = new Products();
    //     $product->name = 'huskbag';
    //     $product->price = '200000';
    //     $product->description = 'tas coconuts';
    //     $product->image = '';
    //     $product->stock = 2;
    //     $product->save();

    // }

    public function run()
    {
        $products = [
            [
                'name' => 'Tas Selempang',
                'price' => 200000,
                'description' => 'Ini deskripsi tas selempang',
                'image' => 'gambar 1.jpg',
                'stock' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tas Main',
                'price' => 150000,
                'description' => 'Celana ya',
                'image' => 'gambar 2.jpg',
                'stock' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        // Insert data ke dalam tabel 'products'
        DB::table('products')->insert($products);

    }
}
