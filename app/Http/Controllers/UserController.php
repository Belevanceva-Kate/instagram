<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequestValidation;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

	public function __construct(UserService $userService) {
		$this->userService = $userService;
	}

    public function showOne(int $id)
    {
		return $this->userService->showOne($id);
    }

    public function showAll()
    {
		return $this->userService->showAll();
    }

    public function createOne(UserRequestValidation $request)
    {
		return $this->userService->createOne();
    }

    public function updateOne(int $id, UserRequestValidation $request)
    {
		return $this->userService->updateOne($id);
    }

    public function deleteOne(int $id)
    {
		return $this->userService->deleteOne($id);
    }
}
