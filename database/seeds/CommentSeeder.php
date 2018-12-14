<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
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

    	$image2 = App\Model\Image::select('id')
    		->where('id', '2')
    		->firstOrFail();

        $user1 = App\Model\User::select('id')
    		->where('id', '2')
    		->firstOrFail();

        App\Model\Comment::create([
        	'content' => 'Oh my God! This is so beautiful!',
        	'image_id' => $image1->id,
        	'user_id' => $user1->id
        ]);

        App\Model\Comment::create([
        	'content' => 'I want to Japan too!',
        	'image_id' => $image2->id,
        	'user_id' => $user1->id
        ]);
    }
}
