<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequestValidation;
use App\Services\CommentService;

class CommentController extends Controller
{
    protected $commentService;

	public function __construct(CommentService $commentService) {
		$this->commentService = $commentService;
	}

    public function showOne(int $id)
    {
		return $this->commentService->showOne($id);
    }

    public function showAll()
    {
		return $this->commentService->showAll();
    }

    public function createOne(CommentRequestValidation $request)
    {
		return $this->commentService->createOne();
    }

    public function updateOne(int $id, CommentRequestValidation $request)
    {
		return $this->commentService->updateOne($id);
    }

    public function deleteOne(int $id)
    {
        return $this->commentService->deleteOne($id);
    }
}
