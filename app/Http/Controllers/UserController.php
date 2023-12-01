<?php

namespace App\Http\Controllers;

use App\Services\UserService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $service;

    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    public function create(Request $request)
    {
        return $this->service->createUser($request);
    }

    public function list()
    {
        return $this->service->listUsers();
    }

    public function update(Request $request)
    {
        return $this->service->updateUser($request);
    }

    public function delete(Request $request)
    {
        return $this->service->deleteUser($request);
    }
}