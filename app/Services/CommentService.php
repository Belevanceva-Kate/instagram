<?php

namespace App\Services;

use App\Repositories\CommentRepository;
use App\Http\Resources\Comment\CommentDataResource;
use App\Http\Resources\Comment\CommentCollectionResource;
use App\Http\Resources\Comment\CommentDeleteResource;

class CommentService
{
	protected $commentRepository;

	public function __construct(CommentRepository $commentRepository) {
		$this->commentRepository = $commentRepository;
	}

    public function showOne(int $id)
    {
    	return new CommentDataResource($this->commentRepository->showOne($id));
    }

    public function showAll()
    {
    	return new CommentCollectionResource($this->commentRepository->showAll());
    }

    public function createOne($request)
    {
    	return new CommentDataResource($this->commentRepository->createOne($request));
    }

    public function updateOne(int $id, $request)
    {
    	return new CommentDataResource($this->commentRepository->updateOne($id, $request));
    }

    public function deleteOne(int $id)
    {
    	return new CommentDeleteResource($this->commentRepository->deleteOne($id));
    }
}
