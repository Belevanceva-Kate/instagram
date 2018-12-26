<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nick', 'birthday', 'about', 'sex', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function showOne(int $id)
    {
        return User::findOrFail($id);
    }

    public static function showAll()
    {
        return User::all();
    }

    public static function createOne(array $attributes)
    {
        return User::create($attributes);
    }

    public static function updateOne(int $id, array $attributes)
    {
        return User::findOrFail($id)->fill($attributes->save());
    }

    public static function deleteOne(int $id)
    {
        return User::destroy($id);
    }
}
