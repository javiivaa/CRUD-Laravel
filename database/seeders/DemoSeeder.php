<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Regalo;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // Crea 5 usuarios y para cada uno crea 2 regalos
        User::factory(5)->create()->each(function ($user) {
            Regalo::create(['name' => 'Regalo A de ' . $user->name, 'user_id' => $user->id]);
            Regalo::create(['name' => 'Regalo B de ' . $user->name, 'user_id' => $user->id]);
        });
    }
}
