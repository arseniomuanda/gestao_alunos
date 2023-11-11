<?php

namespace App\Controllers;

use App\Models\Auditoria;
use App\Models\SalaModel;
use CodeIgniter\RESTful\ResourceController;
use Config\Database;

class Salas extends ResourceController
{
    protected $db;
    protected $auditoriaModel;
    protected $model;

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
        $this->model = new SalaModel();
    }

    public function index()
    {
        $data = [
            'salas' => $this->db->query("SELECT *  FROM `salas`")->getResult()
        ];
        return view('componentes/header') . view('componentes/sider') . view('configuracao/lista/salas', $data) . view('componentes/footer');
    }

    public function adicionar()
    {
        return view('componentes/header') . view('componentes/sider') . view('configuracao/adicionar/salas') . view('componentes/footer');
    }

    public function add()
    {
        helper('funcao');
        $user = getUserToken();

        $data = [
            'nome' => $this->request->getPost('nome'),
            'descricao' => $this->request->getPost('descricao'),
            'criadopor' => $user->id
        ];

        cleanarray($data);

        $result = cadastronormal($this->model, $data, $this->db, $this->auditoriaModel);
        if ($result['code'] !== 200) {
            $data['product'] = $result;
            return $this->respond(returnVoid($data, (int) 400), 400);
        }
        return $this->respond($result, 200);
    }

    public function actualizar($id)
    {
        helper('funcao');
        $user = getUserToken();

        $data = [
            'id' => $id,
            'nome' => $this->request->getPost('nome'),
            'descricao' => $this->request->getPost('descricao'),
            'criadopor' => $user->id
        ];

        cleanarray($data);

        $result = updatenomal($this->model, $data, $this->auditoriaModel);
        if ($result['code'] !== 200) {
            $data['product'] = $result;
            return $this->respond(returnVoid($data, (int) 400), 400);
        }
        return $this->respond($result, 200);
    }

    public function perfil($id)
    {
        $data = [
            'sala' => $this->db->query("SELECT * FROM `salas` WHERE id = $id")->getRow(),
            'turmas' => $this->db->query("SELECT * FROM `turmas` WHERE sala = $id;")->getResult(),
        ];
        return view('componentes/header') . view('componentes/sider') . view('configuracao/perfil/salas', $data) . view('componentes/footer');
    }

    public function remove($id)
    {
        helper('funcao');
        $user = getUserToken();

        if ($user->id != 1) {
            return $this->respond(returnVoid([], (int) 400), 400, 'Apenas utilizador autorizado');
        }


        deletarnormal($id, $this->db, $this->model, $user->id, $this->auditoriaModel);
        return $this->respond([], 200);
    }
}
