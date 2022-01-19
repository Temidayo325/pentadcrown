<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('titles')->delete();
        DB::table('titles')->insert([
           ['job' => 'Web designer'],
           ['job' => 'Web developer'],
           ['job' => 'Fullstack developer'],
           ['job' => 'Front end developer'],
           ['job' => 'Content Writer'],
           ['job' => 'UI designer'],
           ['job' => 'UX Designer'],
           // ['job' => 'Front end developer'],

        ]);
    }
}
