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
        $this->call([
            AlumniSeeder::class,
            TracerSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'admin1',
            'email' => 'admin1@polsri.ac.id',
            'role' => 'ADMIN',
            'password' => bcrypt('11112222'),
        ]);
        
        User::factory()->create([
            'name' => 'dosen1',
            'email' => 'dosen1@polsri.ac.id',
            'role' => 'DOSEN',
            'password' => bcrypt('11112222'),
        ]);
    }
}
