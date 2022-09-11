<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@admin.com',
             'password' => '$2y$10$K2Ga5EJ3Jl6wf7h.z.BHgexqs2axLNW1TqHpIOVZbhWxf4cZ7UDBa',
             'remember_token' => 'kLy0oEHeeitX9FmRxk4WtlxC1o4GjEMMeboh9VUMaLx0pI3L59nkEb9FhUmc',
         ]);
    }
}
