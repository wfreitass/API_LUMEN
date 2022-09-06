<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;

class UserService
{
    private $user;

    public function __construct(UserRepositoryInterface $user)
    {
        return $this->user = $user;
    }

    public function store(array $data)
    {
        return $this->user->store($data);
        // return response()->json(['data' => ['success' => 'Usuário Criado com sucesso!']]);
    }

    public function getList()
    {
        return $this->user->getList(15);
    }

    public function get(int $user)
    {
        return $this->user->get($user);
    }

    public function update(array $data, int $user)
    {
        return $this->user->update($data, $user);
    }

    public function destroy(int $user)
    {
        $this->user->destroy($user);
    }
}
