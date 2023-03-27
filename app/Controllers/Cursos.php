<?php

namespace App\Controllers;

class Cursos extends BaseController
{
    public function index()
    {
        return view('componentes/header') . view('componentes/sider') . view('escolar/lista/cursos') . view('componentes/footer');
    }

    public function adicionar()
    {
        return view('componentes/header') . view('componentes/sider') . view('escolar/adicionar/cursos') . view('componentes/footer');
    }

    public function perfil($id)
    {
        return view('componentes/header') . view('componentes/sider') . view('escolar/perfil/cursos') . view('componentes/footer');
    }
}
