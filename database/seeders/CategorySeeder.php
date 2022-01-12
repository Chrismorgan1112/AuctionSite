<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            ["category_name"=>"Televisi"],
            ["category_name"=>"Jam Tangan"],
            ["category_name"=>"Smartphone"],
            ["category_name"=>"Kendaraan"]
        ]);
    }
}
