<?php

namespace Src\App\Models;

use CoffeeCode\DataLayer\DataLayer;
use Src\App\Models\Model;

class VehicleCategory extends DataLayer
{
    public function __construct()
    {
        parent::__construct('tbVehicleCategory', ['idVehicle', 'idCategory'], 'id', false);
    }

    public function model()
    {
        return (new Model())->findById($this->idModel);
    }
}
