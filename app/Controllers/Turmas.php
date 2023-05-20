<?php

namespace App\Controllers;

use App\Models\Auditoria;
use App\Models\DisciplinaModel;
use App\Models\TurmaModel;
use CodeIgniter\RESTful\ResourceController;
use Config\Database;

class Turmas extends ResourceController
{
    protected $db;
    protected $auditoriaModel;
    protected $turmaModel;

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
        $this->turmaModel = new TurmaModel();
    }

    public function index()
    {
        $data = [
            'disciplinas' => $this->db->query("SELECT disciplinas.id, disciplinas.nome, anos.nome AS ano, cursos.nome AS curso, cursos.sigla FROM `disciplinas` INNER JOIN anos ON disciplinas.ano = anos.id INNER JOIN cursos ON disciplinas.curso = cursos.id")->getResult(),
        ];
        return view('componentes/header') . view('componentes/sider') . view('escolar/lista/disciplinas', $data) . view('componentes/footer');
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
            'sala' => $this->request->getPost('sala'),
            'curso' => $this->request->getPost('curso'),
            'criadopor' => $user->id,
        ];

        cleanarray($data);

        $resposta = cadastronormal($this->turmaModel, $data, $this->db, $this->auditoriaModel);
        if ($resposta['code'] !== 200) {
            return $this->respond(returnVoid($resposta, (int) 400), 400);
        }

        return $this->respond($resposta, 200);
    }

    public function getTurmas($id)
    {
        helper('funcao');
        $user = getUserToken();

        $data = [
            'data' => $this->db->query("SELECT * FROM turmas WHERE curso = $id")->getResult(),
        ];

        return $this->respond($data, 200);
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
            'sala' => $this->request->getPost('sala'), 
            'curso' => $this->request->getPost('curso'),
            'criadopor' => $user->id,
        ];

        cleanarray($data);

        $resposta = updatenomal($this->turmaModel, $data, $this->auditoriaModel);
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

        deletarnormal($id, $this->db, $this->turmaModel, $user->id, $this->auditoriaModel);
        return $this->respond([], 200);
    }

    public function adicionar()
    {
        $data = [
            'anos' => $this->db->query("SELECT * FROM anos")->getResult(),
            'cursos' => $this->db->query("SELECT * FROM cursos")->getResult()
        ];
        return view('componentes/header') . view('componentes/sider') . view('escolar/adicionar/disciplina', $data) . view('componentes/footer');
    }

    public function perfil($id)
    {
        $data = [
            'anos' => $this->db->query("SELECT * FROM anos")->getResult(),
            'cursos' => $this->db->query("SELECT * FROM cursos")->getResult(),
            'disciplina' => $this->db->query("SELECT disciplinas.*, cursos.nome AS curso_nome, anos.nome ano_nome FROM disciplinas INNER JOIN cursos ON disciplinas.curso = cursos.id INNER JOIN anos ON disciplinas.ano = anos.id WHERE disciplinas.id = $id")->getRow(0),
            'primeiro' => $this->db->query("SELECT * FROM `provas` WHERE disciplina = $id AND trimestre = 1")->getResult(),
            'segundo' => $this->db->query("SELECT * FROM `provas` WHERE disciplina = $id AND trimestre = 2")->getResult(),
            'terceiro' => $this->db->query("SELECT * FROM `provas` WHERE disciplina = $id AND trimestre = 3")->getResult(),
        ];

        return view('componentes/header') . view('componentes/sider') . view('escolar/perfil/disciplina', $data) . view('componentes/footer');
    }
}
