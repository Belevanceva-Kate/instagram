<?php

namespace App\Http\Resources\Like;

use Illuminate\Http\Resources\Json\JsonResource;

class LikeDataResource extends JsonResource
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
            'image_id' => $this->image_id,
            'user_id' => $this->user_id
        ];
    }
}
