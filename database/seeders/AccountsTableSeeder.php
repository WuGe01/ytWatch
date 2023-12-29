<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accounts')->insert([
            'account' => 'test',
            'name' => 'testMan',
            'email' => 'test@example.com',
            'password' => Hash::make('1234'),
        ]);
    }
}
