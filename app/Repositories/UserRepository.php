<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
	protected $user;

    public function showOne(int $id)
    {
        try {
            return User::showOne($id);   
        } 
        catch (\Exception $e) {
            throw new \Exception('Not found');
        }
    }

    public function showAll()
    {
    	return User::showAll();
    }

    public function createOne()
    {
    	return User::createOne();
    }

    public function updateOne(int $id)
    {
    	return User::updateOne($id);
    }

    public function deleteOne(int $id)
    {
    	return User::deleteOne($id);
    }
}
