<?php

namespace App\Services;

use App\Repositories\LikeRepository;
use App\Http\Resources\Like\LikeDataResource;
use App\Http\Resources\Like\LikeCollectionResource;
use App\Http\Resources\Like\LikeDeleteResource;

class LikeService
{
	protected $likeRepository;

	public function __construct(LikeRepository $likeRepository) {
		$this->likeRepository = $likeRepository;
	}

    public function showOne(int $id)
    {
    	return new LikeDataResource($this->likeRepository->showOne($id));
    }

    public function showAll()
    {
    	return new LikeCollectionResource($this->likeRepository->showAll());
    }

    public function createOne()
    {
    	return new LikeDataResource($this->likeRepository->createOne($id));
    }

    public function updateOne(int $id)
    {
    	return new LikeDataResource($this->likeRepository->updateOne($id));
    }

    public function deleteOne(int $id)
    {
    	return new LikeDeleteResource($this->likeRepository->deleteOne());
    }
}
