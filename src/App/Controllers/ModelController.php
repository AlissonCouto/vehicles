<?php

namespace Src\App\Controllers;

use League\Plates\Engine;
use Src\App\Models\Model;
use Src\App\Models\Brand;

class ModelController
{

    private $view;

    public function __construct()
    {
        $d = DIRECTORY_SEPARATOR;
        $viewsPath = __DIR__ . ".." . $d . ".." . $d . ".." . $d . "views" . $d . "models";
        $this->view = new Engine($viewsPath, 'php');
    }

    public function index($data)
    {
        $models = (new Model())->find()->fetch(true);

        echo $this->view->render('index', [
            'title' => 'Modelos',
            'models' => $models,
        ]);
    }

    public function show($data)
    {
        echo "<h1>show</h1>";
        var_export($data);
    }

    public function create($data)
    {
        $brands = (new Brand())->find()->fetch(true);

        echo $this->view->render('create', [
            'title' => 'Novo modelo',
            'brands' => $brands,
        ]);
    }

    public function store($data)
    {
        $model = new Model();
        $success = true;
        $messages = [];

        // Validações
        // Campos obrigatórios
        if (!$data['description']) {
            $messages['description'][] = "O nome da marca é obrigatório.";
            $success = false;
        }

        if (!$data['brand']) {
            $messages['brand'][] = "A marca é obrigatória.";
            $success = false;
        }

        // Verificando existência
        $brand = new Brand();
        $idBrand = $brand->findById($data['brand']);
        if (is_null($idBrand)) {
            $messages['brand'][] = "A marca informada não existe.";
            $success = false;
        }

        $model->description = $data['description'];
        $model->idBrand = $data['brand'];

        if ($success) {
            $messages[] = "Registro salvo com sucesso!";

            $model->save();

            $this->index($data);
        } else {
            $brands = $brand->find()->fetch(true);

            echo $this->view->render('create', [
                'title' => 'Novo modelo',
                'messages' => $messages,
                'model' => $model,
                'brands' => $brands
            ]);
        }
    }

    public function edit($data)
    {
        $model = (new Model())->findById($data['id']);
        $brands = (new Brand())->find()->fetch(true);

        echo $this->view->render('edit', [
            'title' => 'Editar modelo',
            'model' => $model,
            'brands' => $brands
        ]);
    }

    public function update($data)
    {
        $model = (new Model())->findById($data['id']);
        $success = true;
        $messages = [];

        // Validações
        // Campos obrigatórios
        if (!$data['description']) {
            $messages['description'][] = "O nome da marca é obrigatório.";
            $success = false;
        }

        if (!$data['brand']) {
            $messages['brand'][] = "A marca é obrigatória.";
            $success = false;
        }

        // Verificando existência
        $brand = new Brand();
        $idBrand = $brand->findById($data['brand']);

        if (is_null($idBrand)) {
            $messages['brand'][] = "A marca informada não existe.";
            $success = false;
        }

        $model->description = $data['description'];
        $model->idBrand = $data['brand'];
        
        if ($success) {
            $messages[] = "Registro editado com sucesso!";
            $model->save();
        }

        $brands = (new Brand())->find()->fetch(true);

        echo $this->view->render('edit', [
            'title' => 'Editar modelo',
            'model' => $model,
            'brands' => $brands,
            'success' => $success,
            'messages' => $messages
        ]);
    }

    public function destroy($data)
    {
        $model = (new Model())->findById($data['id']);

        if($model){
            $model->destroy();
        }
        
        $this->index($data);
    }
}
