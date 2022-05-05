<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $products = [
           [
            'name'=> 'Apple Mackbook Pro 16',
            'details'=> 'Apple M1 Pro, 16 GPU, 16 GB, 512 Gb SSD',
            'description'=> 'The most powerful MacBook Pro ever is here',
            'brand'=> 'Apple',
            'price'=> '2499',
            'shopping_cost'=> '25',
            'image_path'=> 'storage/product.png'
           ],
           [
            'name'=> 'Samsung Galaxy Book Pro',
            'details'=> '13.3 inch, 8GB, DDR4, SDRAM, 256GB',
            'description'=> 'PC power thats smartphone thin',
            'brand'=> 'Samsung',
            'price'=> '1400',
            'shopping_cost'=> '25',
            'image_path'=> 'storage/product2.png'
        ],
    ];
    foreach($products as $key => $value){
        Product::create($value);
     }
    }
    }