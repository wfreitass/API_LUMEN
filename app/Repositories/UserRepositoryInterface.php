<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    public function __construct(User $user);

    public function store(array $data);

    public function getList();

    public function get(int $user);

    public function update(array $data, int $user);

    public function destroy(int $user);

    public function connetCar(int $user, array $data);

    public function disassociateCar(int $user, array $data);
}
