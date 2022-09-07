<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;

    public function __construct(UserService $user)
    {
        return $this->user = $user;
    }

    public function store(Request $request)
    {
        return $this->user->store($request->all());
    }

    public function getList()
    {
        return $this->user->getList();
    }

    public function show($user)
    {
        return $this->user->get($user);
    }

    public function update(Request $request, int $user)
    {
        return $this->user->update($request->all(), $user);
    }

    public function destroy(int $user)
    {
        return $this->user->destroy($user);
    }

    public function connectCar(int $user, Request $request)
    {
        return $this->user->connectCar($user, $request->all('cars')['cars']);
    }

    public function disassociateCar(int $user, Request $request)
    {
        return $this->user->disassociateCar($user, $request->all('cars')['cars']);
    }
}
