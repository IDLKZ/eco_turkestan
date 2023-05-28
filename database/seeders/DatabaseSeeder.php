<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Marker;
use Illuminate\Database\Seeder;
use MongoDB\Driver\Query;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
//        $this->call([
//           RoleSeeder::class,
//           UserSeeder::class,
//            BreedSeeder::class,
//            CategorySeeder::class,
//            EventSeeder::class,
//            SanitarySeeder::class,
//            StatusSeeder::class,
//            TypeSeeder::class,
//            AreaSeeder::class,
//            PlaceSeeder::class
//        ]);
//        Marker::factory()->count(1000)->create();
    }
}
