<?php

namespace App\Repositories;

use App\Models\Filter;

class FilterRepository
{
	protected $filter;

    public function showOne(int $id)
    {
        try {
            return Filter::showOne($id);   
        } 
        catch (\Exception $e) {
            throw new \Exception('Not found');
        }
    }

    public function showAll()
    {
    	return Filter::showAll();
    }

    public function createOne($request)
    {
        try {
    	    return Filter::createOne($request);
        }
        catch (\Exception $e) {
            throw new \Exception('Creating error');
        }
    }

    public function updateOne(int $id, $request)
    {
    	return Filter::updateOne($id, $request);
    }

    public function deleteOne(int $id)
    {
    	return Filter::deleteOne($id);
    }
}
