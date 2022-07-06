<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Factory;

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
        //call the UsersTableSeeder class
      //  $this->call(UsersTableSeeder::class);
      //call the factory method
      \App\Models\User::factory(30)->create();
    }
}
