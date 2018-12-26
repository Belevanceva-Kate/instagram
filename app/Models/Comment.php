<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends XModel
{
    public static function showOne(int $id)
    {
    	return Comment::findOrFail($id);
    }

    public static function showAll()
    {
    	return Comment::all();
    }

    public static function createOne(array $attributes)
    {
    	return Comment::create($attributes);
    }

    public static function updateOne(int $id, array $attributes)
    {
    	return Comment::findOrFail($id)->fill($attributes->save());
    }

    public static function deleteOne(int $id)
    {
    	return Comment::destroy($id);
    }
}
