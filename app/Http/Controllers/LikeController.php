<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LikeRequestValidation;
use App\Services\LikeService;

class LikeController extends Controller
{
    protected $likeService;

	public function __construct(LikeService $likeService) {
		$this->likeService = $likeService;
	}

    public function showOne(int $id)
    {
		return $this->likeService->showOne($id);
    }

    public function showAll()
    {
		return $this->likeService->showAll();
    }

    public function createOne(LikeRequestValidation $request)
    {
        $inputData = $request->only(['image_id', 'user_id']);
		return $this->likeService->createOne($inputData);
    }

    public function updateOne(int $id, LikeRequestValidation $request)
    {
		return $this->likeService->updateOne($id, $request);
    }

    public function deleteOne(int $id)
    {
		return $this->likeService->deleteOne($id);
    }
}
