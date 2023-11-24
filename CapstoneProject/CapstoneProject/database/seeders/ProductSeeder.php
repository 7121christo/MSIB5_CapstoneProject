<?php

namespace Database\Seeders;

use App\Products;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = new Products();
        $product->name = 'huskbag';
        $product->price = '200000';
        $product->description = 'tas coconuts';
        $product->image = '';
        $product->stock = 2;
        $product->save();

    }
}
