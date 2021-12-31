<?php

namespace Src\App\Models;

use CoffeeCode\DataLayer\DataLayer;

class Category extends DataLayer
{
    public function __construct()
    {
        parent::__construct('tbCategories', ['description'], 'id', false);
    }

    /* Exemplo de polimorfismo do método save */
    /*public function save(): bool {
        // Faz verificação
        parent::save();
    }*/
}
