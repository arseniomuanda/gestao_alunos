<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('componentes/header'). view('componentes/sider') .view('componentes/main'). view('componentes/footer');
    }
}
