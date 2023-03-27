<?php

namespace App\Controllers;

class Candidaturas extends BaseController
{
    public function index()
    {
        return view('componentes/header') . view('componentes/sider') . view('candidaturas/candidatos') . view('componentes/footer');
    }

    public function perfil($id)
    {
        return view('componentes/header') . view('componentes/sider') . view('candidaturas/candidato_perfil') . view('componentes/footer');
    }

    public function adicionar()
    {
        return;
    }
}
