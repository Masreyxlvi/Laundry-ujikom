<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
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
        // \App\Models\User::factory(7)->create();
        Outlet::factory(10)->create();
        Member::factory(10)->create();
        Paket::factory(10)->create();

        User::create([
            'name' => 'Reyhan Tri Ramadan',
            'username' => 'Masrey',
            'email' => 'reyhantriramadan@gmail.com',
            'password' => bcrypt('masrey2246'),
            'outlet_id' => '3',
            'role' => 'admin',
            'is_super' =>   1
        ]);

        // User::create([
        //     'name' => 'Reyhan Tri ',
        //     'username' => 'Masrey',
        //     'email' => 'reyhantriramadan22@gmail.com',
        //     'password' => bcrypt('masrey2246'),
        //     'outlet_id' => '3',
        //     'role' => 'admin',
        //     'is_super' =>   0
        // ]);
    }
}
