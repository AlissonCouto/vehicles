<?php

namespace Src\App\Controllers;

use League\Plates\Engine;
use Src\App\Models\Category;

class CategoryController
{

    private $view;

    public function __construct()
    {
        $d = DIRECTORY_SEPARATOR;
        $viewsPath = __DIR__ . ".." . $d . ".." . $d . ".." . $d . "views" . $d . "categories";
        $this->view = new Engine($viewsPath, 'php');
    }

    public function index($data)
    {
        $category = new Category();
        $list = $category->find()->fetch(true);

        echo $this->view->render('index', [
            'title' => 'Categorias',
            'categories' => $list
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
            'title' => 'Nova categoria',
        ]);
    }

    public function store($data)
    {
        $model = new Category();
        $success = true;
        $messages = [];

        // Validações
        // Campos obrigatórios
        if (!$data['description']) {
            $messages['description'][] = "O nome da categoria é obrigatório.";
            $success = false;
        }

        $model->description = $data['description'];

        if ($success) {
            $messages[] = "Registro salvo com sucesso!";

            $model->save();

            $this->index($data);
        } else {
            echo $this->view->render('create', [
                'title' => 'Nova categoria',
                'messages' => $messages,
                'category' => $model,
            ]);
        }

    }

    public function edit($data)
    {
        $model = new Category();
        $category = $model->findById($data['id']);

        echo $this->view->render('edit', [
            'title' => 'Editar categoria',
            'category' => $category,
        ]);
    }

    public function update($data)
    {
        $model = (new Category())->findById($data['id']);
        $success = true;
        $messages = [];

        // Validações
        // Campos obrigatórios
        if (!$data['description']) {
            $messages['description'][] = "O nome da categoria é obrigatório.";
            $success = false;
        }

        $model->description = $data['description'];

        if ($success) {
            $messages[] = "Registro editado com sucesso!";
            $model->save();
        }

        echo $this->view->render('edit', [
            'title' => 'Editar categoria',
            'category' => $model,
            'success' => $success,
            'messages' => $messages
        ]);
    }

    public function destroy($data)
    {
        $brand = (new Category())->findById($data['id']);

        if($brand){
            $brand->destroy();
        }
        
        $this->index($data);
    }
}
