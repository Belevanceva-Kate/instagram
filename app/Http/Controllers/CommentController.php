<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
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
        $inputData = $request->only(['content', 'image_id', 'user_id']);
		return $this->commentService->createOne($inputData);
    }

    public function updateOne(int $id, CommentRequestValidation $request)
    {
		return $this->commentService->updateOne($id, $request);
    }

    public function deleteOne(int $id)
    {
        return $this->commentService->deleteOne($id);
    }
}
