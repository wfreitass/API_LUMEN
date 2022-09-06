<?php

namespace App\Repositories;

use App\Models\Car;

interface CarRepositoryInterface
{
    public function __construct(Car $car);

    public function store(array $data);

    public function getList();

    public function get(int $car);

    public function update(array $data, int $car);

    public function destroy(int $car);
}
