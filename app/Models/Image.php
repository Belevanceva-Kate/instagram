<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class Image extends XModel
{
    public static function showOne(int $id)
    {
    	return Image::findOrFail($id);
    }

    public static function showAll()
    {
    	return Image::all();
    }

    public static function createOne(array $attributes)
    {
    	return Image::create($attributes);
    }

    public static function updateOne(int $id, array $attributes) : JsonResponse
    {
        try {
            Image::find($id)->fill($attributes)->save();
        } 
        catch (\Exception $e) {
            logger($e->getMessage());
            return response()->json(['status' => false, 'message' => $e->getMessage()], 422);
        }

        return response()->json(['status' => true, 'message' => 'success'], 200);
        
        // $result->path = $attributes['path'];
        // $result->name = $attributes['name'];
        // $result->description = $attributes['description'];
        // $result->user_id = $attributes['user_id'];

    	// return Image::findOrFail($id)->fill($result->save());
    }

    public static function deleteOne(int $id)
    {
    	return Image::destroy($id);
    }
}
