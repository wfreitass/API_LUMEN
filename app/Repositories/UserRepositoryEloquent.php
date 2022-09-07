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
        return $newUser;
        // return response()->json(['data' => ['success' => 'Usuário Criado com sucesso!', 'user' => $newUser]]);
    }

    public function getList()
    {
        // $user = $this->user->all(); 
        return $this->user->all(); 
        
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

    public function connetCar(int $user, array $data){
        $user = $this->user->find($user);
        $user->cars()->attach($data);
        return $user;
    }

    public function disassociateCar(int $user, array $data){

    }
}
