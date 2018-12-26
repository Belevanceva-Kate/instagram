<?php

namespace App\Services;

use App\Repositories\FilterRepository;
use App\Http\Resources\Filter\FilterDataResource;
use App\Http\Resources\Filter\FilterCollectionResource;
use App\Http\Resources\Filter\FilterDeleteResource;

class FilterService
{
	protected $filterRepository;

	public function __construct(FilterRepository $filterRepository) {
		$this->filterRepository = $filterRepository;
	}

    public function showOne(int $id)
    {
    	return new FilterDataResource($this->filterRepository->showOne($id));
    }

    public function showAll()
    {
    	return new FilterCollectionResource($this->filterRepository->showAll());
    }

    public function createOne()
    {
    	return new FilterDataResource($this->filterRepository->createOne());
    }

    public function updateOne(int $id)
    {
    	return new FilterDataResource($this->filterRepository->updateOne($id));
    }

    public function deleteOne(int $id)
    {
    	return new FilterDeleteResource($this->filterRepository->deleteOne($id));
    }
}
