<?php

namespace App\Http\Controllers;

use App\Services\CarService;
use Illuminate\Http\Request;

class CarController extends Controller
{
    private $car;

    public function __construct(CarService $car)
    {
        return $this->car = $car;
    }

    public function store(Request $request)
    {
        return  $this->car->store($request->all());
    }

    public function getList()
    {
        return $this->car->getList();
    }

    public function show($car)
    {
        return $this->car->get($car);
    }

    public function update(Request $request, int $car)
    {
        return $this->car->update($request->all(), $car);
    }

    public function destroy(int $car)
    {
        return $this->car->destroy($car);
    }
}
