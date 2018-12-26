<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 15)->create();
        
        // App\Models\User::create([
        // 	'name' => 'Kate',
        // 	'nick' => 'Ariel',
        // 	'birthday' => '1996-11-27',
        // 	'about' => 'helllllllo',
        // 	'sex' => 'female',
        // 	'email' => 'belekate27@rambler.ru',
        // 	'email_verified_at' => now(),
        // 	'password' => '111111',
        // 	'remember_token' => str_random(10),
        // ]);
    }
}
