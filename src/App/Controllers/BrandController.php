<?php

namespace Src\App\Controllers;

use League\Plates\Engine;
use Src\App\Models\Brand;

class BrandController
{

    private $view;

    public function __construct()
    {
        $d = DIRECTORY_SEPARATOR;
        $viewsPath = __DIR__ . ".." . $d . ".." . $d . ".." . $d . "views" . $d . "brands";
        $this->view = new Engine($viewsPath, 'php');
    }

    public function index($data)
    {
        $brand = new Brand();
        $list = $brand->find()->fetch(true);

        echo $this->view->render('index', [
            'title' => 'Marcas',
            'brands' => $list
        ]);
    }

    public function show($data)
    {
        echo "<h1>show</h1>";
        var_export($data);
    }

    public function create($data)
    {
        echo $this->view->render('create', [
            'title' => 'Nova marca',
        ]);
    }

    public function store($data)
    {
        $model = new Brand();
        $success = true;
        $messages = [];

        // Validações
        // Campos obrigatórios
        if (!$data['description']) {
            $messages['description'][] = "O nome da marca é obrigatório.";
            $success = false;
        }

        $model->description = $data['description'];

        if ($success) {
            $messages[] = "Registro salvo com sucesso!";

            $model->save();

            $this->index($data);
        } else {
            echo $this->view->render('create', [
                'title' => 'Nova marca',
                'messages' => $messages,
                'brand' => $model,
            ]);
        }

    }

    public function edit($data)
    {
        $model = new Brand();
        $brand = $model->findById($data['id']);

        echo $this->view->render('edit', [
            'title' => 'Editar marca',
            'brand' => $brand,
        ]);
    }

    public function update($data)
    {
        $model = (new Brand())->findById($data['id']);
        $success = true;
        $messages = [];

        // Validações
        // Campos obrigatórios
        if (!$data['description']) {
            $messages['description'][] = "O nome da marca é obrigatório.";
            $success = false;
        }

        $model->description = $data['description'];

        if ($success) {
            $messages[] = "Registro editado com sucesso!";
            $model->save();
        }

        echo $this->view->render('edit', [
            'title' => 'Editar marca',
            'brand' => $model,
            'success' => $success,
            'messages' => $messages
        ]);
    }

    public function destroy($data)
    {
        $brand = (new Brand())->findById($data['id']);

        if($brand){
            $brand->destroy();
        }
        
        $this->index($data);
    }
}
