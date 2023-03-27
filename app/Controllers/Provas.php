<?php

namespace App\Controllers;

class Provas extends BaseController
{
    public function index()
    {
        return view('componentes/header') . view('componentes/sider') . view('escolar/lista/provas') . view('componentes/footer');
    }

    public function adicionar()
    {
        return view('componentes/header') . view('componentes/sider') . view('escolar/adicionar/provas') . view('componentes/footer');
    }

    public function perfil($id)
    {
        return view('componentes/header') . view('componentes/sider') . view('escolar/perfil/provas') . view('componentes/footer');
    }
}