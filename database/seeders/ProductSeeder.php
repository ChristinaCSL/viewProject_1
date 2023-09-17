<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $product=new Product();
        // $product->name="iphone";
        // $product->quantity="10";
        // $product->save();

        // $product_data=[
        //     // 'name'=>'samsung',
        //     // 'quantity'=>5

        //     'name'=>Str::random(10),
        //     'quantity'=>rand(1,1000)
        // ];
        // $product =Product::Create($product_data);

        Product::factory()->count(500)->create();
    }
}
