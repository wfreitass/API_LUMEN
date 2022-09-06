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
        $newUser = $this->user->create($data);
        $newUser->cars()->attach($data['cars']);
        return response()->json(['data' => ['success' => 'Usuário Criado com sucesso!', 'user' => $newUser]]);
    }

    public function getList()
    {
         
        $users = $this->user->all();
        foreach ($users as $key => $user) {
            $users[$key]['cars'] = $user->cars()->get();
        }
        return $users;
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
