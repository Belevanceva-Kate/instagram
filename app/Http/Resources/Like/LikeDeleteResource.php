<?php

namespace App\Http\Resources\Like;

use Illuminate\Http\Resources\Json\JsonResource;

class LikeDeleteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'message' => 'success'
        ];
    }
}
