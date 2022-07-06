<?php

namespace Database\Seeders;
use DB;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
        'name'=>'anuja palkhe',
        'email'=>'apanuja5001@yahoo.com',
        'password'=>bcrypt('123456789'),
        'country_id'=>1
       ]);
    }
}
