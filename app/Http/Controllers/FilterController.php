<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRequestValidation;
use App\Services\FilterService;

class FilterController extends Controller
{
    protected $filterService;

	public function __construct(FilterService $filterService) {
		$this->filterService = $filterService;
	}

    public function showOne(int $id)
    {
		return $this->filterService->showOne($id);
    }

    public function showAll()
    {
		return $this->filterService->showAll();
    }

    public function createOne(FilterRequestValidation $request)
    {
		return $this->filterService->createOne();
    }

    public function updateOne(int $id, FilterRequestValidation $request)
    {
		return $this->filterService->updateOne($id);
    }

    public function deleteOne(int $id)
    {
		return $this->filterService->deleteOne($id);
    }
}
