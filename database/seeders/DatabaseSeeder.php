<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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

        $user1 = \App\Models\User::create([
            'unique_id'=>'123456',
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@bizpayglobal.com',
            'phone' => '0000000',
            'date' => '1992-04-21',
            'coupone_code'=>'0000000000',
            'package'=>"Admin",
            'isAdmin' => '1',
            'referral'=>'admin',
            'isVerified'=>'1',
            'ref_bonus'=>'0000000',
            'password' => Hash::make('2r@stok45'),
        ]);
    }
}
