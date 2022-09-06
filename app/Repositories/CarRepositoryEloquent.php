<?php

namespace App\Repositories;

use App\Models\Car;


class CarRepositoryEloquent implements CarRepositoryInterface
{

    protected $car;

    public function __construct(Car $car)
    {
        return $this->car = $car;
    }

    public function store(array $data)
    {
        return $this->car->create($data);
        // return response()->json(['data' => ['success' => 'Usuário Criado com sucesso!']]);
    }

    public function getList()
    {
        return $this->car->all();
    }

    public function get(int $car)
    {
        return $this->car->find($car);
        // return $this->car->find($car)->cars();

    }

    public function update(array $data, int $car)
    {
        return  $this->car->find($car)->update($data);
    }

    public function destroy(int $car)
    {
        return $this->car->find($car)->delete();
    }
}
