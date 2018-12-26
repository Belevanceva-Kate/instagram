<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Http\Resources\User\UserDataResource;
use App\Http\Resources\User\UserCollectionResource;
use App\Http\Resources\User\UserDeleteResource;

class UserService
{
	protected $userRepository;

	public function __construct(UserRepository $userRepository) {
		$this->userRepository = $userRepository;
	}

    public function showOne(int $id)
    {
    	return new UserDataResource($this->userRepository->showOne($id));
    }

    public function showAll()
    {
    	return new UserCollectionResource($this->userRepository->showAll());
    }

    public function createOne()
    {
    	return new UserDataResource($this->userRepository->createOne());
    }

    public function updateOne(int $id)
    {
    	return new UserDataResource($this->userRepository->updateOne($id));
    }

    public function deleteOne(int $id)
    {
    	return new UserDeleteResource($this->userRepository->deleteOne($id));
    }
}
