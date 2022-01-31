<?php

namespace Database\Seeders;

use App\Models\outlet;
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
        outlet::factory(10)->create();
        User::create([
            'name' => 'Reyhan Tri Ramadan',
            'username' => 'Masrey',
            'email' => 'reyhantriramadan@gmail.com',
            'password' => bcrypt('masrey2246'),
            'outlet_id' => '3',
            'role' => 'admin'
        ]);
    }
}
