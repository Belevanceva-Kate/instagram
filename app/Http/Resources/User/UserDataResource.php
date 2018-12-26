<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserDataResource extends JsonResource
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
            'name' => $this->name,
            'nick' => $this->nick,
            'birthday' => $this->birthday,
            'about' => $this->about,
            'sex' => $this->sex,
            'email' => $this->email,
            'password' => $this->password
        ];
    }
}
