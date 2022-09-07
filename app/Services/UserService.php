<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use Exception;

class UserService
{
    private $user;

    public function __construct(UserRepositoryInterface $user)
    {
        return $this->user = $user;
    }

    public function store(array $data)
    {
        try {
            $user = $this->user->store($data);
            return response()->json(['data' => ['success' => 'Usuário Criado com sucesso!', 'user' => $user]]);
        } catch (Exception $e) {
            return response()->json(['data' => ['error' => 'Erro ao tentar criar um usuário', 'Error' => $e->getMessage()]]);
        }
        
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
        if(!$this->user->get($user)){
            return response()->json(['data' => ['warning' => 'Usuário não encontrado']]);
        }
        return $this->user->get($user);
    }

    public function update(array $data, int $user)
    {
        try {
            $this->user->update($data, $user);
            return response()->json(['data' => ['success' => 'Usuário Atualizado com sucesso!']]);
        } catch (Exception $e) {
            return response()->json(['data' => ['error' => 'Erro ao tentar atualizar o usuário', "ERROR" => $e->getMessage()]]);
        }
       
    }

    public function destroy(int $user)
    {
        try {
            $this->user->destroy($user);
            return response()->json(['data' => ['success' => 'Usuário Excluído com sucesso!']]);
        } catch (Exception $e) {
            return response()->json(['data' => ['error' => 'Erro ao tentar Excluir o usuário', "ERROR" => $e->getMessage()]]);
        }
    }

    public function connectCar(int $user, array $data){
        try {
            $this->user->connectCar($user, $data);
            return response()->json(['data' => ['success' => 'Carro(s) Associados com sucesso!']]);
        } catch (Exception $e) {
            return response()->json(['data' => ['error' => 'Erro ao tentar associar carro(s)', "ERROR" => $e->getMessage()]]);
        }
        
    }

    public function disassociateCar(int $user, array $data){
        try {
            $user = $this->user->disassociateCar($user, $data);
            return response()->json(['data' => ['success' => 'Carro(s) Desassociados com sucesso!']]);
        } catch (Exception $e) {
            return response()->json(['data' => ['error' => 'Erro ao tentar associar carro(s)', "ERROR" => $e->getMessage()]]);
        }
       
    }
}
