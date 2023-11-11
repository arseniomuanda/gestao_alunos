<?php

namespace App\Controllers;

use App\Models\Auditoria;
use App\Models\CursoModel;
use CodeIgniter\RESTful\ResourceController;
use Config\Database;

class Cursos extends ResourceController
{
    protected $db;
    protected $auditoriaModel;
    protected $cursoModel;

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
        $this->cursoModel = new CursoModel();
    }


    public function index()
    {
        $data = [
            'cursos' => $this->db->query("SELECT `cursos`.*, (SELECT COUNT(*) FROM `alunos` WHERE `curso` = `cursos`.`id`) AS `qtd_alunos` FROM `cursos`")->getResult()
        ];
        return view('componentes/header') . view('componentes/sider') . view('escolar/lista/cursos', $data) . view('componentes/footer');
    }


    public function listar()
    {
        $data =  $this->db->query("SELECT `cursos`.*, (SELECT COUNT(*) FROM `alunos` WHERE `curso` = `cursos`.`id`) AS `qtd_alunos` FROM `cursos`")->getResult();
        return $this->respond($data);
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
            'sigla' => $this->request->getPost('sigla'),
            'limite_alunos' => $this->request->getPost('limite_alunos'),
            'criadopor' => $user->id,
        ];

        cleanarray($data);

        $resposta = cadastronormal($this->cursoModel, $data, $this->db, $this->auditoriaModel);
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
            'sigla' => $this->request->getPost('sigla'),
            'limite_alunos' => $this->request->getPost('limite_alunos'),
            'criadopor' => $user->id,
        ];

        cleanarray($data);

        $resposta = updatenomal($this->cursoModel, $data, $this->auditoriaModel);
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


        deletarnormal($id, $this->db, $this->cursoModel, $user->id, $this->auditoriaModel);
        return $this->respond([], 200);
    }

    public function getDisciplina($id){
        helper('funcao');
        $user = getUserToken();

        $data = [
            'code'=> 200,
            'data' => $this->db->query("SELECT * FROM disciplinas WHERE curso = $id")->getResult(),
        ];

        return $this->respond($data, 200);
    }

    public function adicionar()
    {
        return view('componentes/header') . view('componentes/sider') . view('escolar/adicionar/cursos') . view('componentes/footer');
    }

    public function perfil($id)
    {
       
        $data = [
            'professores'=>  $this->db->query("SELECT funcionarios.*, disciplinas.nome AS disciplina, categorias.nome AS categoria, utilizadores.nome, utilizadores.bi, utilizadores.sexo FROM `funcionarios` INNER JOIN `utilizadores` ON funcionarios.utilizador = utilizadores.id INNER JOIN categorias ON funcionarios.categoria = categorias.id INNER JOIN professores ON funcionarios.id = professores.funcionario INNER JOIN disciplinas ON disciplinas.id = professores.disciplina WHERE disciplinas.curso = $id;")->getResult(),
            'alunos'=>  $this->db->query("SELECT alunos.*, utilizadores.nome, utilizadores.sexo, turmas.nome AS turma FROM alunos INNER JOIN utilizadores ON alunos.utilizador = utilizadores.id INNER JOIN cursos ON alunos.curso = cursos.id INNER JOIN turmas ON alunos.turma = turmas.id WHERE alunos.curso = $id")->getResult(),
            'disciplinas'=>  $this->db->query("SELECT disciplinas.*, anos.nome AS ano FROM `disciplinas` INNER JOIN anos ON disciplinas.ano = anos.id WHERE curso = $id")->getResult(),
            'curso' => $this->db->query("SELECT `cursos`.*, (SELECT COUNT(*) FROM `alunos` WHERE `curso` = `cursos`.`id`) AS `qtd_alunos`, (SELECT COUNT(*) FROM `disciplinas` WHERE `curso` = `cursos`.`id`) AS `qtd_disciplinas` FROM `cursos` WHERE `id` = $id")->getRow(0)
        ];
        return view('componentes/header') . view('componentes/sider') . view('escolar/perfil/cursos', $data) . view('componentes/footer');
    }
}
