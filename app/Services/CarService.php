<?php

namespace App\Services;

use App\Repositories\CarRepositoryInterface;
use Exception;

class CarService
{
    private $car;

    public function __construct(CarRepositoryInterface $car)
    {
        return $this->car = $car;
    }

    public function store(array $data)
    {

        try {
            $this->car->store($data);
            return response()->json(['data' => ['success' => 'Carro Criado com sucesso!']]);
        } catch (Exception $e) {
            return response()->json(['data' => ['error' => 'Erro ao tentar criar um carro', 'Error' => $e->getMessage()]]);
        }
    }

    public function getList()
    {
        return $this->car->getList();
    }

    public function get(int $car)
    {
        if (!$this->car->get($car)) {
            return response()->json(['data' => ['warning' => 'Carro não encontrado']]);
        }
        return $this->car->get($car);
    }

    public function update(array $data, int $car)
    {
        try {
            $this->car->update($data, $car);
            return response()->json(['data' => ['success' => 'Carro Atualizado com sucesso!']]);
        } catch (Exception $e) {
            return response()->json(['data' => ['error' => 'Erro ao tentar atualizar um carro', 'Error' => $e->getMessage()]]);
        }
    }

    public function destroy(int $car)
    {
        try {
            $this->car->destroy($car);
            return response()->json(['data' => ['success' => 'Carro Excluído com sucesso!']]);
        } catch (Exception $e) {
            return response()->json(['data' => ['error' => 'Erro ao tentar Excluir um carro', 'Error' => $e->getMessage()]]);
        }
       
    }
}
