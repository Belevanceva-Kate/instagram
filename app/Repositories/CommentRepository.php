<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
	protected $comment;

    public function showOne(int $id)
    {
        try {
            return Comment::showOne($id);   
        } 
        catch (\Exception $e) {
            throw new \Exception('Not found');
        }
    }

    public function showAll()
    {
        try {
    	   return Comment::showAll();
        } 
        catch (\Exception $e) {
            throw new \Exception('Not found');
        }
    }

    public function createOne($request)
    {
        try {
           return Comment::createOne($request); 
        }
        catch (\Exception $e) {
            throw new \Exception('Creating error');
        }
    }

    public function updateOne(int $id, $request)
    {
        try {
    	   return Comment::updateOne($id, $request->all());
        }
        catch (\Exception $e) {
            throw new \Exception('Updating error');
        }
    }

    public function deleteOne(int $id)
    {
        try {
    	   return Comment::deleteOne($id); 
        }
        catch (\Exception $e) {
            throw new \Exception('Deleting error');
        }
    }
}
