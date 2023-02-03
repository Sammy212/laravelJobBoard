<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'John Wick',
            'email' => 'john.wick@gmail.com'
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);

        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Lagos, NG',
        //     'email' => 'sample@email.com',
        //     'website' => 'https://www.datadocs.com.ng',
        //     'description' => 'This is some sample dummy text there nothing resonable writen here just useless words to fill up your screen'
        // ]);

        // Listing::create([
        //     'title' => 'Full-Stack Engineer Developer',
        //     'tags' => 'laravel, backend, api',
        //     'company' => 'Umbrella Corp',
        //     'location' => 'Lagos, NG',
        //     'email' => 'another@email.com',
        //     'website' => 'https://umbrella.com',
        //     'description' => 'This is some sample dummy text there nothing resonable writen here just useless words to fill up your screen'
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
