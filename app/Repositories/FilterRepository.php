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

    public function createOne()
    {
    	return Filter::createOne();
    }

    public function updateOne(int $id)
    {
    	return Filter::updateOne($id);
    }

    public function deleteOne(int $id)
    {
    	return Filter::deleteOne($id);
    }
}
