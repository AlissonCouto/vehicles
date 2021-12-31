<?php

namespace Src\App\Models;

use CoffeeCode\DataLayer\DataLayer;
use Src\App\Models\Model;

class Vehicle extends DataLayer
{
    public function __construct()
    {
        parent::__construct('tbVehicles', ['chassis', 'idModel', 'plate', 'year'], 'id', false);
    }

    public function model()
    {
        return (new Model())->findById($this->idModel);
    }

    public function categoriesChecked()
    {
        $categories = $this->vehicleCategory();
        $results = [];
        
        if($categories){
            foreach ($categories as $category) {
                $results[] = $category->idCategory;
            }
        }

        return $results;
    }

    public function vehicleCategory()
    {
        return (new VehicleCategory())->find('idVehicle = :vehicle', ':vehicle=' . $this->id)->fetch(true);
    }

    public function categories()
    {

        $ids = $this->categoriesChecked();

        $categories = (new Category)->find('id in ('.implode(', ', $ids).')')->fetch(true);

        return $categories;
    }
}
