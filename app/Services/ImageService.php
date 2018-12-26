<?php

namespace App\Services;

use App\Repositories\ImageRepository;
use App\Http\Resources\Image\ImageDataResource;
use App\Http\Resources\Image\ImageCollectionResource;
use App\Http\Resources\Image\ImageDeleteResource;
use App\Logics\ImageEditor;

class ImageService
{
	protected $imageRepository;

	public function __construct(ImageRepository $imageRepository) {
		$this->imageRepository = $imageRepository;
	}

    public function showOne(int $id)
    {
    	return new ImageDataResource($this->imageRepository->showOne($id));
    }

    public function showAll()
    {
    	return new ImageCollectionResource($this->imageRepository->showAll());
    }

    public function createOne($request)
    {
        $editImage = new ImageEditor;
        $result = $editImage->checkFilters($request);
        $request['path'] = $result;

        // delete filter params from request bc they don't need to save in database
        if(key_exists('filter', $request)) {
            unset($request['filter']);
        }
        
    	return new ImageDataResource($this->imageRepository->createOne($request));
    }

    public function updateOne(int $id, $request)
    {
    	return new ImageDataResource($this->imageRepository->updateOne($id, $request));
    }

    public function deleteOne(int $id)
    {
    	return new ImageDeleteResource($this->imageRepository->deleteOne($id));
    }
}
