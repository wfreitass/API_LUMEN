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
        $this->car->store($data);
        return response()->json(['data' => ['success' => 'Carro Criado com sucesso!']]);
    }

    public function getList()
    {
        return $this->car->getList();
    }

    public function get(int $car)
    {
        return $this->car->get($car);
    }

    public function update(array $data, int $car)
    {
        $this->car->update($data, $car);
        return response()->json(['data' => ['success' => 'Carro Atualizado com sucesso!']]);
    }

    public function destroy(int $car)
    {
        $this->car->destroy($car);
        return response()->json(['data' => ['success' => 'Carro Excluído com sucesso!']]);

    }
}
