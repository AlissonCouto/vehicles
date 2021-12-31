<?php

namespace Src\App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Model extends DataLayer
{
    public function __construct()
    {
        parent::__construct('tbModels', ['description', 'idBrand'], 'id', false);
    }

    public function brand()
    {
        return (new Brand())->findById($this->idBrand);
    }

    /* Exemplo de polimorfismo do método save */
    /*public function save(): bool {
        // Faz verificação
        parent::save();
    }*/
}
