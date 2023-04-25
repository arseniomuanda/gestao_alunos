<?php

namespace App\Controllers;

use App\Models\Auditoria;
use App\Models\UtilizadoreModel;
use Config\Database;

class Utilizadores extends BaseController
{
    protected $db;
    protected $auditoriaModel;
    protected $utilizadorModel;

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
        $this->utilizadorModel = new UtilizadoreModel();
    }

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
        $data = [
            'utilizador' => $this->db->query("SELECT * FROM " . $this->utilizadorModel->table . " WHERE id = $id")->getRow(0)
        ];
        return view('componentes/header') . view('componentes/sider') . view('utilizadores/perfil', $data) . view('componentes/footer');
    }
}
