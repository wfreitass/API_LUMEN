<?php

namespace App\Repositories;

use App\Models\Car;
use App\Models\User;

class UserRepositoryEloquent implements UserRepositoryInterface
{

    protected $user;

    public function __construct(User $user)
    {
        return $this->user = $user;
    }

    public function store(array $data)
    {
        return $this->user->create($data);
        // return response()->json(['data' => ['success' => 'Usuário Criado com sucesso!']]);
    }

    public function getList()
    {
        return $this->user->paginate(15);
    }

    public function get(int $user)
    {
        return $this->user->find($user);
        // return $this->user->find($user)->cars();

    }

    public function update(array $data, int $user)
    {
        return  $this->user->find($user)->update($data);
    }

    public function destroy(int $user)
    {
        return $this->user->find($user)->delete();
    }
}
