<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['user_name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt(12345678),
            'gender' => 'M',
            'role' => 'admin'],
            
            ['user_name' => 'Chrismorgan',
            'email' => 'chris@gmail.com',
            'password' => bcrypt(12345678),
            'gender' => 'M',
            'role' => 'customer']
        ]);
    }
}
