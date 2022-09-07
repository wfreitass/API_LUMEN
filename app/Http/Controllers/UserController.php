<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // private $user;
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct(User $user)
    // {
    //     $this->user = $user;
    // }

    // public function index()
    // {
    //     return $this->user->paginate(15);
    // }

    // public function show($user)
    // {

    //     return $this->user->find($user);
    // }

    // public function store(Request $request)
    // {
    //     $this->user->create($request->all());
    //     return response()->json(['data' => ['success' => 'Usuário Criado com sucesso!']]);
    // }

    // public function update(Request $request, $user)
    // {
    //     $data = $this->user->find($user);
    //     $data->update($request->all());
    //     return response()->json(['data' => ['success' => 'Usuário atualizado com sucesso!']]);
    // }

    // public function delete($user)
    // {
    //     $this->user->destroy($user);
    //     return response()->json(['data' => ['success' => 'Usuário deletado com sucesso!']]);
    // }

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
