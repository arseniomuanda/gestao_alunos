<?php

namespace App\Controllers;

class Funcionarios extends BaseController
{
    public function index()
    {
        return view('componentes/header') . view('componentes/sider') . view('rh/lista') . view('componentes/footer');
    }

    public function adicionar()
    {
        return view('componentes/header') . view('componentes/sider') . view('rh/adicionar') . view('componentes/footer');
    }

    public function perfil($id)
    {
        return view('componentes/header') . view('componentes/sider') . view('rh/perfil') . view('componentes/footer');
    }
}
