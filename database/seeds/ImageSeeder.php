<?php

use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user1 = App\Model\User::select('id')
    		->where('id', '1')
    		->firstOrFail();

        App\Model\Image::create([
        	'path' => 'nature.jpg',
        	'name' => 'Nature',
        	'description' => 'It is unbelievable. I was in Japan!',
        	'user_id' => $user1->id
        ]);
    }
}
