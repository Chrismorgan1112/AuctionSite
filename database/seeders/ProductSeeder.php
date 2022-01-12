<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        date_default_timezone_set('Asia/Jakarta');
        DB::table('products')->insert([
            [
                'category_id'=>'1',
                'product_title'=>'Samsung TV 1',
                'product_desc'=>'Samsung TV yang masih memiliki perawatan yang bagus dan berfungsi normal',
                'product_price'=>1000000,
                'status'=>'open',
                'image_path'=>'images/TV.jpg',
                'end_date'=>'2022-01-12 18:55:30'
            ],
            [
                'category_id'=>'1',
                'product_title'=>'Samsung TV 2',
                'product_desc'=>'Samsung TV yang masih memiliki perawatan yang bagus dan berfungsi normal',
                'product_price'=>2000000,
                'status'=>'close',
                'image_path'=>'images/TV.jpg',
                'end_date'=>'2022-01-04 15:59:59'
            ],[
                'category_id'=>'1',
                'product_title'=>'Samsung TV 3',
                'product_desc'=>'Samsung TV yang masih memiliki perawatan yang bagus dan berfungsi normal',
                'product_price'=>3000000,
                'status'=>'open',
                'image_path'=>'images/TV.jpg',
                'end_date'=>'2022-01-12 18:55:59'
            ]
        ]);
    }
}
