<?php

namespace Src\App\Controllers;
use League\Plates\Engine;

class WebController {

    private $view;

    public function __construct()
    {
        $d = DIRECTORY_SEPARATOR;
        $viewsPath = __DIR__ . ".." . $d . ".." . $d . ".." . $d . "views";
        $this->view = new Engine($viewsPath, 'php');
    }

    public function error($data){
        echo $this->view->render('error', [
            'title' => 'Error ' . $data["errcode"],
            'error' => $data["errcode"]
        ]);
    }
}