<?php

namespace App\Controllers;

class Disciplinas extends BaseController
{
    public function index()
    {
        return view('componentes/header') . view('componentes/sider') . view('escolar/lista/disciplinas') . view('componentes/footer');
    }

    public function adicionar()
    {
        return view('componentes/header') . view('componentes/sider') . view('escolar/adicionar/disciplinas') . view('componentes/footer');
    }

    public function perfil($id)
    {
        return view('componentes/header') . view('componentes/sider') . view('escolar/perfil/disciplinas') . view('componentes/footer');
    }
}
