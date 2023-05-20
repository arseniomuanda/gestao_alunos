<?php

namespace App\Controllers;

use App\Models\Auditoria;
use App\Models\CandidatoModel;
use Config\Database;

class Candidaturas extends BaseController
{
    protected $db;
    protected $auditoriaModel;
    protected $candidatoModel;


    public function __construct()
    {
        // headers
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
            // you want to allow, and if so:
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');    // cache for 1 day
        }
        // Access-Control headers are received during OPTIONS requests
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
                // may also be using PUT, PATCH, HEAD etc
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
            }

            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
                header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
            }

            exit(0);
        }

        $this->db = Database::connect();
        $this->auditoriaModel = new Auditoria();
        $this->candidatoModel = new CandidatoModel();
    }

    public function index()
    {
        $data = [
            'candidatos' => $this->db->query("SELECT candidatos.*, campanhas.nome campanha FROM `candidatos` INNER JOIN campanhas ON candidatos.campanha = candidatos.id")->getResult()
        ];
        return view('componentes/header') . view('componentes/sider') . view('candidaturas/candidatos', $data) . view('componentes/footer');
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
