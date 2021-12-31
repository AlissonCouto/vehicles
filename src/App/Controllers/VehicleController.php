<?php

namespace Src\App\Controllers;

use League\Plates\Engine;
use Src\App\Models\Vehicle;
use Src\App\Models\Model;
use Src\App\Models\Category;
use Src\App\Models\VehicleCategory;

class VehicleController
{

    private $view;

    public function __construct()
    {
        $d = DIRECTORY_SEPARATOR;
        $viewsPath = __DIR__ . ".." . $d . ".." . $d . ".." . $d . "views" . $d . "vehicles";
        $this->view = new Engine($viewsPath, 'php');
    }

    public function index($data)
    {
        $vehicle = new Vehicle();
        $list = $vehicle->find()->fetch(true);

        echo $this->view->render('index', [
            'title' => 'Veículos',
            'vehicles' => $list
        ]);
    }

    public function show($data)
    {
        $vehicle = (new Vehicle())->findById($data['id']);

        echo $this->view->render('details', [
            'title' => 'Detalhes do veículo',
            'vehicle' => $vehicle,
        ]);
    }

    public function create($data)
    {
        $models = (new Model())->find()->fetch(true);

        $categories = (new Category)->find()->fetch(true);

        echo $this->view->render('create', [
            'title' => 'Novo veículo',
            'models' => $models,
            'categories' => $categories
        ]);
    }

    public function store($data)
    {
        $model = new Vehicle();
        $success = true;
        $messages = [];

        // Validações
        // Campos únicos
        $validation = $model->find('chassis = :chassis', ':chassis=' . $data['chassis'])->fetch();
        if ($validation && $data['chassis']) {
            $messages['chassis'][] = "Esse nº de chassi já está cadastrado.";
            $success = false;
        }

        $validation = $model->find('plate = :plate', ':plate=' . $data['plate'])->fetch();
        if ($validation && $data['plate']) {
            $messages['plate'][] = "Essa placa já está cadastrada.";
            $success = false;
        }

        // Campos obrigatórios
        $categories = isset($data['categories']) ? $data['categories'] : [];

        if (count($categories) < 2) {
            $messages['categories'][] = "Selecione pelo menos duas categorias.";
            $success = false;
        }

        if (!$data['chassis']) {
            $messages['chassis'][] = "O nº de chassi é obrigatório.";
            $success = false;
        }

        if (!$data['plate']) {
            $messages['plate'][] = "A placa é obrigatória.";
            $success = false;
        }

        if (!$data['year']) {
            $messages['year'][] = "O ano é obrigatório.";
            $success = false;
        }

        if (!$data['model']) {
            $messages['model'][] = "O modelo é obrigatório.";
            $success = false;
        }

        // Formatos
        if (!ctype_alnum($data['chassis'])) {
            $messages['chassis'][] = "O formato do nº de chassi é inválido.";
            $success = false;
        }

        if (!ctype_alnum($data['plate']) || strlen($data['plate']) != 7) {
            $messages['plate'][] = "O formato da placa é inválido.";
            $success = false;
        }

        if (strlen($data['year']) != 4 && !ctype_digit($data['year'])) {
            $messages['year'][] = "O formato do ano é inválido.";
            $success = false;
        }

        // Verificando existência
        $vehicleModel = new Model();
        $idModel = $vehicleModel->findById($data['model']);
        if (is_null($idModel)) {
            $messages['model'][] = "O modelo informado não existe.";
            $success = false;
        }

        $model->chassis = $data['chassis'];
        $model->plate = $data['plate'];
        $model->year = $data['year'];
        $model->idModel = $data['model'];

        if ($success) {
            $messages[] = "Registro salvo com sucesso!";

            $model->save();

            foreach ($categories as $category) {
                $vc = new VehicleCategory();
                $vc->idVehicle = $model->id;
                $vc->idCategory = $category;

                $vc->save();
            }

            $this->index($data);
        } else {
            $models = $vehicleModel->find()->fetch(true);
            $categories = (new Category)->find()->fetch(true);

            echo $this->view->render('create', [
                'title' => 'Novo veículo',
                'messages' => $messages,
                'vehicle' => $model,
                'models' => $models,
                'categories' => $categories
            ]);
        }
    }

    public function edit($data)
    {
        $model = new Vehicle();
        $vehicle = $model->findById($data['id']);
        $vehicleModel = new Model();
        $models = $vehicleModel->find()->fetch(true);
        $categories = (new Category)->find()->fetch(true);

        echo $this->view->render('edit', [
            'title' => 'Editar veículo',
            'vehicle' => $vehicle,
            'models' => $models,
            'categories' => $categories
        ]);
    }

    public function update($data)
    {
        $success = true;
        $messages = [];

        $model = new Vehicle();
        $vehicle = $model->findById($data['id']);

        // Validações
        // Campos únicos
        $validation = $model->find('chassis = :chassis', ':chassis=' . $data['chassis'])->fetch();
        if ($validation && ($data['chassis'] != $vehicle->chassis)) {
            $messages['chassis'][] = "Esse nº de chassi já está cadastrado.";
            $success = false;
        }

        $validation = $model->find('plate = :plate', ':plate=' . $data['plate'])->fetch();
        if ($validation && ($data['plate'] != $vehicle->plate)) {
            $messages['plate'][] = "Essa placa já está cadastrada.";
            $success = false;
        }

        // Campos obrigatórios
        $categories = isset($data['categories']) ? $data['categories'] : [];

        if (count($categories) < 2) {
            $messages['categories'][] = "Selecione pelo menos duas categorias.";
            $success = false;
        }

        if (!$data['chassis']) {
            $messages['chassis'][] = "O nº de chassi é obrigatório.";
            $success = false;
        }

        if (!$data['plate']) {
            $messages['plate'][] = "A placa é obrigatória.";
            $success = false;
        }

        if (!$data['year']) {
            $messages['year'][] = "O ano é obrigatório.";
            $success = false;
        }

        if (!$data['model']) {
            $messages['model'][] = "O modelo é obrigatório.";
            $success = false;
        }

        // Formatos
        if (!ctype_alnum($data['chassis'])) {
            $messages['chassis'][] = "O formato do nº de chassi é inválido.";
            $success = false;
        }

        if (!ctype_alnum($data['plate']) || strlen($data['plate']) != 7) {
            $messages['plate'][] = "O formato da placa é inválido.";
            $success = false;
        }

        if (strlen($data['year']) != 4 && !ctype_digit($data['year'])) {
            $messages['year'][] = "O formato do ano é inválido.";
            $success = false;
        }

        // Verificando existência
        $vehicleModel = new Model();
        $idModel = $vehicleModel->findById($data['model']);
        if (is_null($idModel)) {
            $messages['model'][] = "O modelo informado não existe.";
            $success = false;
        }

        $vehicle->chassis = $data['chassis'];
        $vehicle->plate = $data['plate'];
        $vehicle->year = $data['year'];
        $vehicle->idModel = $data['model'];

        if ($success) {
            $messages[] = "Registro editado com sucesso!";
            $vehicle->save();

            $vehicleCategory = $vehicle->vehicleCategory();

            if ($vehicleCategory) {
                foreach ($vehicleCategory as $vc) {
                    $vc->destroy();
                }
            }

            foreach ($categories as $category) {
                $saveRelationship = new VehicleCategory();
                $saveRelationship->idVehicle = $vehicle->id;
                $saveRelationship->idCategory = $category;

                $saveRelationship->save();
            }
        }

        $vehicleModel = new Model();
        $models = $vehicleModel->find()->fetch(true);
        $categories = (new Category)->find()->fetch(true);

        echo $this->view->render('edit', [
            'title' => 'Editar veículo',
            'vehicle' => $vehicle,
            'models' => $models,
            'success' => $success,
            'messages' => $messages,
            'categories' => $categories
        ]);
    }

    public function destroy($data)
    {
        $vehicle = (new Vehicle())->findById($data['id']);

        if ($vehicle) {
            $vehicle->destroy();
        }

        $this->index($data);
    }
}
