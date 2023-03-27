<?php

namespace App\Controllers;

class Vagas extends BaseController
{
    public function index()
    {
        return view('componentes/header') . view('componentes/sider') . view('candidaturas/vagas') . view('componentes/footer');
    }

    public function perfil($id)
    {
        return view('componentes/header') . view('componentes/sider') . view('candidaturas/vaga_perfil') . view('componentes/footer');
    }

    public function adicionar()
    {
        return view('componentes/header') . view('componentes/sider') . view('candidaturas/vaga_add') . view('componentes/footer');
    }
}
