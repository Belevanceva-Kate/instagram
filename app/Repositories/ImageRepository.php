<?php

namespace App\Repositories;

use App\Models\Image;
// use App\Logics\ImageEditor;

class ImageRepository
{
	protected $image;

    public function showOne(int $id)
    {
        try {
            return Image::showOne($id);   
        } 
        catch (\Exception $e) {
            throw new \Exception('Not found');
        }
    }

    public function showAll()
    {
    	return Image::showAll();
    }

    public function createOne($request)
    {
        // print_r($this);
        // $foo->hello()
    	return Image::createOne($request);
    }

    public function updateOne(int $id, $request)
    {
    	return Image::updateOne($id, $request);
    }

    public function deleteOne(int $id)
    {
    	return Image::deleteOne($id);
    }
}
