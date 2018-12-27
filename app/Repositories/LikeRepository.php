<?php

namespace App\Repositories;

use App\Models\Like;

class LikeRepository
{
	protected $like;

    public function showOne(int $id)
    {
        try {
            return Like::showOne($id);   
        } 
        catch (\Exception $e) {
            throw new \Exception('Not found');
        }
    }

    public function showAll()
    {
    	return Like::showAll();
    }

    public function createOne($request)
    {
    	return Like::createOne($request);
    }

    public function updateOne(int $id)
    {
    	return Like::updateOne($id);
    }

    public function deleteOne(int $id)
    {
    	return Like::deleteOne($id);
    }
}
