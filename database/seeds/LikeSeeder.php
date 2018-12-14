<?php

use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$image1 = App\Model\Image::select('id')
    		->where('id', '1')
    		->firstOrFail();

        $user1 = App\Model\User::select('id')
    		->where('id', '2')
    		->firstOrFail();

        App\Model\Like::create([
        	'image_id' => $image1->id,
        	'user_id' => $user1->id
        ]);
    }
}
