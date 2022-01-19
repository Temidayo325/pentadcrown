<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admins')->delete();
      $admins = [
          ['email' => 'temi325@gmail.com', 'password' => Hash::make('12345678'), 'remember' => null],
          ['email' => 'aderemi@gmail.com', 'password' => Hash::make('12345678'), 'remember' => null],
          ['email' => 'weyray@gmail.com', 'password' => Hash::make('12345678'), 'remember' => null],
        ];
      // $categories = ['Food', 'Chill', 'Data', 'Airtime', 'Transport', 'Books', 'Software', 'Inventory'];
      // foreach ($categories as $category) {
        // code...
        DB::table('admins')->insert($admins);
    }
}
