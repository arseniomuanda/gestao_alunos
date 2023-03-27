<?php

namespace App\Controllers;

class Utilizadores extends BaseController
{
    public function index()
    {
        return view('componentes/header') . view('componentes/sider') . view('utilizadores/lista') . view('componentes/footer');
    }

    public function adicionar()
    {
        return view('componentes/header') . view('componentes/sider') . view('utilizadores/adicionar') . view('componentes/footer');
    }

    public function perfil($id)
    {
        return view('componentes/header') . view('componentes/sider') . view('utilizadores/perfil') . view('componentes/footer');
    }
}
