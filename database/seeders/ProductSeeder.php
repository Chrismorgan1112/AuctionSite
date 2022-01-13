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
                'product_title'=>'Samsung TV 32N4001',
                'product_desc'=>'Samsung TV 32N4001 yang masih memiliki perawatan yang bagus dan berfungsi normal',
                'product_price'=>1500000,
                'status'=>'open',
                'image_path'=>'images/Samsung TV 32N4001.jpg',
                'end_date'=>'2022-01-30 23:59:00'
            ],
            [
                'category_id'=>'1',
                'product_title'=>'Samsung TV N5001',
                'product_desc'=>'Rasakan pengalaman menonton yang lebih berkesan dengan Samsung TV N5001, TV LED dengan tipe layar Full HD beresolusi 1920 x 1080pixels.',
                'product_price'=>2300000,
                'status'=>'close',
                'image_path'=>'images/Samsung TV N5001.jpg',
                'end_date'=>'2022-01-10 15:59:00'
            ],[
                'category_id'=>'1',
                'product_title'=>'Samsung NU7090 50-inch',
                'product_desc'=>'Samsung TV NU7090 50-inch, TV LED 50" dengan tipe layar 4K beresolusi 3840 x 2160pixels. Lelang Segera!!!',
                'product_price'=>4000000,
                'status'=>'open',
                'image_path'=>'images/Samsung NU7090 50-inch.jpg',
                'end_date'=>'2022-01-25 18:59:00'
            ],
            [
                'category_id'=>'2',
                'product_title'=>'Casio Baby-G Special Color BA-130WP-2ADR',
                'product_desc'=>'Kualitas jam tangan masih baik, tidak ada kerusakan ataupun tergores',
                'product_price'=>1000000,
                'status'=>'open',
                'image_path'=>'images/Casio Baby-G Special Color BA-130WP-2ADR.jpg',
                'end_date'=>'2022-01-24 20:59:00'
            ],
            [
                'category_id'=>'2',
                'product_title'=>'Fossil Neutra FS5826 Chronograph Blue',
                'product_desc'=>'Jam tangan Fossil dilelang!!!, Ayuk segera dapatkan jam tangan dengan harga yang murah',
                'product_price'=>1300000,
                'status'=>'close',
                'image_path'=>'images/Fossil Neutra FS5826 Chronograph Blue.jpg',
                'end_date'=>'2022-01-04 20:59:00'
            ],
            [
                'category_id'=>'3',
                'product_title'=>'Samsung Galaxy A52',
                'product_desc'=>'Samsung Galaxy A52 merupakan handphone HP dengan kapasitas 4500mAh dan layar 6.5" yang dilengkapi dengan kamera belakang 64 + 12 + 5 + 5MP.',
                'product_price'=>3500000,
                'status'=>'close',
                'image_path'=>'images/Samsung Galaxy A52.jpg',
                'end_date'=>'2022-01-01 20:59:00'
            ],
            [
                'category_id'=>'3',
                'product_title'=>'Samsung Galaxy A10',
                'product_desc'=>'Dapatkan segera samsung Smartphone Galaxy A10 dengan harga termurah!!',
                'product_price'=>900000,
                'status'=>'open',
                'image_path'=>'images/Samsung Galaxy A10.jpg',
                'end_date'=>'2022-02-01 21:59:00'
            ],
            [
                'category_id'=>'4',
                'product_title'=>'Toyota Kijang Inova',
                'product_desc'=>'Spesifikasi mobil lengkap, tidak merupakan mobil kecelakaan sebelumnya',
                'product_price'=>300000000,
                'status'=>'close',
                'image_path'=>'images/Toyota Kijang Innova.jpg',
                'end_date'=>'2022-01-02 21:59:00'
            ]
        ]);
    }
}
