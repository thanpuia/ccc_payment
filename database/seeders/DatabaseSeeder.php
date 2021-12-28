<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

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
        DB::table('rates')->insert([
            'name' => 'PCR',
            'rate' => '100'
        ]);
        DB::table('rates')->insert([
            'name' => 'Truenat',
            'rate' => '100',
        ]);
        DB::table('rates')->insert([
            'name' => 'RAT',
            'rate' => '100',
        ]);
        DB::table('rates')->insert([
            'name' => 'Food',
            'rate' => '120',
        ]);

        DB::table('rates')->insert([
            'name' => 'Accomodation',
            'rate' => '50',
        ]);

        DB::table('users')->insert([
            'name' => 'Nokia',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password')
        ]);

    }
}
