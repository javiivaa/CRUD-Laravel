<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegaloSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('regalos')->insert([
            ['name' => 'Pelota'],
            ['name' => 'Dulces'],
            ['name' => 'Libro'],
        ]);
    }
}
