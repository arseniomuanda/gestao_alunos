<?php

namespace App\Controllers;

class Estudantes extends BaseController
{
    public function index()
    {
        return view('componentes/header') . view('componentes/sider') . view('escolar/lista/estudantes') . view('componentes/footer');
    }

    public function adicionar()
    {
        return view('componentes/header') . view('componentes/sider') . view('escolar/adicionar/estudantes') . view('componentes/footer');
    }

    public function perfil($id)
    {
        return view('componentes/header') . view('componentes/sider') . view('escolar/perfil/estudantes') . view('componentes/footer');
    }
}
