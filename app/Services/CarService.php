<?php

namespace App\Services;

use App\Repositories\CarRepositoryInterface;

class CarService
{
    private $car;

    public function __construct(CarRepositoryInterface $car)
    {
        return $this->car = $car;
    }

    public function store(array $data)
    {
        return $this->car->store($data);
        // return response()->json(['data' => ['success' => 'Usuário Criado com sucesso!']]);
    }

    public function getList()
    {
        return $this->car->getList(15);
    }

    public function get(int $car)
    {
        return $this->car->get($car);
    }

    public function update(array $data, int $car)
    {
        return $this->car->update($data, $car);
    }

    public function destroy(int $car)
    {
        $this->car->destroy($car);
    }
}
