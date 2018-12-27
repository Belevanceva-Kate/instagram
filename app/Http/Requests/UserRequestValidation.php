<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequestValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'nick' => 'required|string|unique:users|max:255',
            'birthday' => 'date',
            'about' => 'string|max:255',
            'sex' => 'string|max:10',
            'email' => 'string|unique:users|max:255',
            'password' => 'required|string|max:255',
        ];
    }
}
