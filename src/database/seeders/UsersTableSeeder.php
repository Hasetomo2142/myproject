<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'dummy@email.com',
            'email_verified_at' => null, // email_verified_atカラムに対応
            'password' => bcrypt('test1234'),
            'remember_token' => null, // remember_tokenカラムに対応
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}