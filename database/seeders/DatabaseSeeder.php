<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create(
            [
                'name' => 'sameD',
                'email' => 'dwa17@yahoo.com',
                'password' => bcrypt('katakunci'),
            ]
        );

        // User::factory()->create(
        //     [
        //         'name' => 'aentyr',
        //         'email' => 'palyat@anakmalam.com',
        //         'password' => bcrypt('anakpergerakan'),
        //     ]
        // );
    }
}
