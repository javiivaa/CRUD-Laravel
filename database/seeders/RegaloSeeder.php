<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class RegaloSeeder extends Seeder
{
    public function run(): void
    {
        // asegúrate de tener al menos un usuario para asignar
        $user = User::first() ?? User::factory()->create(['name' => 'Seed User', 'email' => 'seed@example.com']);

        DB::table('regalos')->insert([
            ['name' => 'Pelota', 'user_id' => $user->id],
            ['name' => 'Dulces', 'user_id' => $user->id],
            ['name' => 'Libro', 'user_id' => $user->id],
        ]);
    }
}
