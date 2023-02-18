<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin\Access;
use App\Models\Admin\User;
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
        User::factory()
            ->hasAttached(
                Access::factory()->count(3),
                ['status' => 'ACTIVE']
            )->create([
                'name' => 'Cristian Gonzalez',
                'email' => 'cristiangt9@gmail.com',
            ]);
    }
}
