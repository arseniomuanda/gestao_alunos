<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Home extends ResourceController
{
    public function index()
    {
        return view('componentes/header') . view('componentes/sider') . view('componentes/main') . view('componentes/footer');
    }


    public function api()
    {
        helper('funcao');
        $data = [];
        return $this->respond(returnVoid($data, 200));
    }
}
