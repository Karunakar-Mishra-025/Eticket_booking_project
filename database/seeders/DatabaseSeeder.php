<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Trains;
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
        
        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'karunakarmishra2006@gmail.com',
            'password'=>encrypt("9920096388")
        ]);
            
    }
}
