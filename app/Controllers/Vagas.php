<?php

namespace App\Controllers;

use App\Models\Auditoria;
use App\Models\CampanhaModel;
use CodeIgniter\RESTful\ResourceController;
use Config\Database;

class Vagas extends ResourceController
{
    protected $db;
    protected $auditoriaModel;
    protected $campanhaModel;

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
        $this->campanhaModel = new CampanhaModel();
    }

    public function mostrar($id = null){
        if(is_null($id)){
            $data = $this->db->query("SELECT * FROM " . $this->campanhaModel->table)->getResult();
        }else{
            $data = $this->db->query("SELECT * FROM " . $this->campanhaModel->table . " WHERE id = $id")->getRow();
        }
        return $this->respond($data);
    }

    public function index()
    {
        $data = [
            'vagas' => $this->db->query("SELECT * FROM " . $this->campanhaModel->table)->getResult()
        ];
        return view('componentes/header') . view('componentes/sider') . view('candidaturas/vagas', $data) . view('componentes/footer');
    }

    public function perfil($id)
    {
        $data = [
            'vaga' => $this->db->query("SELECT * FROM " . $this->campanhaModel->table . " WHERE id = $id")->getRow(),
            'candidatos' => $this->db->query("SELECT candidatos.*, campanhas.nome campanha FROM `candidatos` INNER JOIN campanhas ON candidatos.campanha = candidatos.id WHERE campanha = $id")->getResult()
        ];
        return view('componentes/header') . view('componentes/sider') . view('candidaturas/vaga_perfil', $data) . view('componentes/footer');
    }

    public function adicionar()
    {
        return view('componentes/header') . view('componentes/sider') . view('candidaturas/vaga_add') . view('componentes/footer');
    }

    public function add()
    {
        helper('funcao');
        $user = getUserToken();

        if ($user->id > 2) {
            return $this->respond(returnVoid([], (int) 400), 400, 'Apenas utilizador autorizado');
        }

        $data = [
            'nome' => $this->request->getPost('nome'), 
            'inicio' => $this->request->getPost('inicio'), 
            'fim' => $this->request->getPost('fim'), 
            'maximo_candidados' => $this->request->getPost('maximo_candidados'),
            'criadopor' => $user->id,
        ];

        cleanarray($data);

        $resposta = cadastronormal($this->campanhaModel, $data, $this->db, $this->auditoriaModel);
        if ($resposta['code'] !== 200) {
            return $this->respond(returnVoid($resposta, (int) 400), 400);
        }

        return $this->respond($resposta, 200);
    }

    public function actualizar($id)
    {
        helper('funcao');
        $user = getUserToken();

        if ($user->id != 1) {
            return $this->respond(returnVoid([], (int) 400), 400, 'Apenas utilizador autorizado');
        }

        $data = [
            'id' => $id,
            'nome' => $this->request->getPost('nome'),
            'inicio' => $this->request->getPost('inicio'),
            'fim' => $this->request->getPost('fim'),
            'estado' => $this->request->getPost('estado'),
            'maximo_candidados' => $this->request->getPost('maximo_candidados'),
            'criadopor' => $user->id,
        ];

        cleanarray($data);

        $resposta = updatenomal($this->campanhaModel, $data, $this->auditoriaModel);
        if ($resposta['code'] !== 200) {
            return $this->respond(returnVoid($resposta, (int) 400), 400);
        }

        return $this->respond($resposta, 200);
    }

    public function remove($id)
    {
        helper('funcao');
        $user = getUserToken();

        if ($user->id != 1) {
            return $this->respond(returnVoid([], (int) 400), 400, 'Apenas utilizador autorizado');
        }

        deletarnormal($id, $this->db, $this->campanhaModel, $user->id, $this->auditoriaModel);
        return $this->respond([], 200);
    }
}
