<?php

namespace App\Controllers;

use App\Models\Auditoria;
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
            'turmas' => $this->db->query("SELECT turmas.*, salas.nome AS sala, cursos.nome AS curso FROM `turmas` INNER JOIN salas ON turmas.sala = salas.id INNER JOIN cursos ON turmas.curso = cursos.id")->getResult(),
        ];
        return view('componentes/header') . view('componentes/sider') . view('configuracao/lista/turmas', $data) . view('componentes/footer');
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
            'code'=> 200,
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
            'salas' => $this->db->query("SELECT * FROM `salas`")->getResult(),
            'cursos' => $this->db->query("SELECT * FROM `cursos`")->getResult(),
        ];
        return view('componentes/header') . view('componentes/sider') . view('configuracao/adicionar/turmas', $data) . view('componentes/footer');
    }

    public function perfil($id)
    {
        $data = [
            'salas' => $this->db->query("SELECT * FROM `salas`")->getResult(),
            'cursos' => $this->db->query("SELECT * FROM `cursos`")->getResult(),
            'turma' => $this->db->query("SELECT turmas.*, salas.nome AS sala, salas.id AS sala_id, cursos.nome AS curso, cursos.id AS curso_id FROM `turmas` INNER JOIN salas ON turmas.sala = salas.id INNER JOIN cursos ON turmas.curso = cursos.id WHERE turmas.id = $id")->getRow(),
            'alunos' => $this->db->query("SELECT alunos.*, utilizadores.nome, utilizadores.sexo, cursos.nome AS curso, turmas.nome AS turma FROM alunos INNER JOIN utilizadores ON alunos.utilizador = utilizadores.id INNER JOIN cursos ON alunos.curso = cursos.id INNER JOIN turmas ON alunos.turma = turmas.id WHERE alunos.turma = $id")->getResult()
        ];

        return view('componentes/header') . view('componentes/sider') . view('configuracao/perfil/turmas', $data) . view('componentes/footer');
    }
}
