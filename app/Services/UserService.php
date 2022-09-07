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
        $user = $this->user->store($data);
        // return response()->json(['data' => ['success' => 'Usuário Criado com sucesso!']]);
        return response()->json(['data' => ['success' => 'Usuário Criado com sucesso!', 'user' => $user]]);
    }

    public function getList()
    {
        $users = $this->user->getList();
        foreach ($users as $key => $user) {
            $users[$key]['cars'] = $user->cars()->get();
        }
        return $users;
    }

    public function get(int $user)
    {
        return $this->user->get($user);
    }

    public function update(array $data, int $user)
    {
        $this->user->update($data, $user);
        return response()->json(['data' => ['success' => 'Usuário Atualizado com sucesso!']]);
    }

    public function destroy(int $user)
    {
        $this->user->destroy($user);
        return response()->json(['data' => ['success' => 'Usuário Excluído com sucesso!']]);
    }

    public function connectCar(int $user, array $data){
        $this->user->connectCar($user, $data);
        return response()->json(['data' => ['success' => 'Carro(s) Associados com sucesso!']]);
    }

    public function disassociateCar(int $user, array $data){
        $user = $this->user->disassociateCar($user, $data);
        return response()->json(['data' => ['success' => 'Carro(s) Desassociados com sucesso!']]);
    }
}
