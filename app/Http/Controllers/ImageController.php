<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageRequestValidation;
use App\Services\ImageService;

class ImageController extends Controller
{
    protected $imageService;

	public function __construct(ImageService $imageService) {
		$this->imageService = $imageService;
	}

    public function showOne(int $id)
    {
		return $this->imageService->showOne($id);
    }

    public function showAll()
    {
		return $this->imageService->showAll();
    }

    public function createOne(Request $request)
    {
        // print_r($request->all());

        // if param was send
        if(key_exists('filter', $request->all())) {
            $inputData = $request->only(['path', 'name', 'description', 'user_id', 'filter']);
        }
        else {
            $inputData = $request->only(['path', 'name', 'description', 'user_id']);
        }

        return $this->imageService->createOne($inputData);
    }

    public function updateOne(int $id, Request $request)
    {
        $inputData = $request->only(['path', 'name', 'description', 'user_id']);
		return $this->imageService->updateOne($id, $inputData);
    }

    public function deleteOne(int $id)
    {
		return $this->imageService->deleteOne($id);
    }
}
