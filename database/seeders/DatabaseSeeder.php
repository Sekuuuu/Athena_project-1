<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Listing::factory(10)->create();


        // Listing::create([
        //     'title' => 'full stacker',
        //     'tags' => 'full stacker',
        //     'company' => 'full stacker',
        //     'location' => 'full stacker',
        //     'email' => 'full stacker',
        //     'website' => 'full stacker',
        //     'description' => 'I am the full stacker blyat'
        // ]);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}