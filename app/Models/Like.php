<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends XModel
{
    public static function showOne(int $id)
    {
    	return Like::findOrFail($id);
    }

    public static function showAll()
    {
    	return Like::all();
    }

    public static function createOne(array $attributes)
    {
    	return Like::create($attributes);
    }

    public static function updateOne(int $id, array $attributes)
    {
    	return Like::findOrFail($id)->fill($attributes->save());
    }

    public static function deleteOne(int $id)
    {
    	return Like::destroy($id);
    }
}
