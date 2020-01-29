<?php

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
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'horitomo',
            'email' => 'ths75149@gmail.com',
            'password' => bcrypt('okttm0425'),
        ]);
    }
}
