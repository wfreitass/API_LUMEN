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
        return $newUser;
    }

    public function getList()
    {
        return $this->user->all();  
    }

    public function get(int $user)
    {
        return $this->user->find($user);
    }

    public function update(array $data, int $user)
    {
        return  $this->user->find($user)->update($data);
    }

    public function destroy(int $user)
    {
        return $this->user->find($user)->delete();
    }

    public function connectCar(int $user, array $data){
        $user = $this->user->find($user);
        $user->cars()->attach($data);
        return $user;
    }

    public function disassociateCar(int $user, array $data){
        $user = $this->user->find($user);
        $user->cars()->detach($data);
        return $user;
    }
}
