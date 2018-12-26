<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filter extends XModel
{
    public static function showOne(int $id)
    {
    	return Filter::findOrFail($id);
    }

    public static function showAll()
    {
    	return Filter::all();
    }

    public static function createOne(array $attributes)
    {
    	return Filter::create($attributes);
    }

    public static function updateOne(int $id, array $attributes)
    {
    	return Filter::findOrFail($id)->fill($attributes->save());
    }

    public static function deleteOne(int $id)
    {
    	return Filter::destroy($id);
    }
}
