<?php

namespace App\Controllers;

use App\Models\Auditoria;
use App\Models\NotaModel;
use App\Models\ProvaModel;
use CodeIgniter\RESTful\ResourceController;
use Config\Database;

class Provas extends ResourceController
{
    protected $db;
    protected $auditoriaModel;
    protected $provaModel;
    protected $notaModel;

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
        $this->provaModel = new ProvaModel();
        $this->notaModel = new NotaModel();
    }

    public function index()
    {
        $data  = [
            'provas' => $this->db->query("SELECT provas.*, disciplinas.nome disciplina, anos.nome ano, trimestres.nome trimestre FROM `provas` INNER JOIN disciplinas ON provas.disciplina = disciplinas.id INNER JOIN anos ON provas.ano = anos.id INNER JOIN trimestres ON provas.trimestre = trimestres.id ORDER BY provas.ano, provas.trimestre;")->getResult()
        ];
        return view('componentes/header') . view('componentes/sider') . view('escolar/lista/provas', $data) . view('componentes/footer');
    }

    public function adicionar()
    {
        $data = [
            'trimestres' => $this->db->query("SELECT * FROM trimestres")->getResult(),
            'anos' => $this->db->query("SELECT * FROM anos")->getResult(),
            'cursos' => $this->db->query("SELECT * FROM cursos")->getResult(),
        ];
        return view('componentes/header') . view('componentes/sider') . view('escolar/adicionar/prova', $data) . view('componentes/footer');
    }

    public function perfil($id)
    {
        $data = [
            'trimestres' => $this->db->query("SELECT * FROM trimestres")->getResult(),
            'anos' => $this->db->query("SELECT * FROM anos")->getResult(),
            'cursos' => $this->db->query("SELECT * FROM cursos")->getResult(),
            'prova' => $prova = $this->db->query("SELECT provas.*, disciplinas.curso curso, disciplinas.nome disciplina_nome, anos.nome ano_nome, trimestres.nome trimestre_nome FROM `provas` INNER JOIN disciplinas ON provas.disciplina = disciplinas.id INNER JOIN anos ON provas.ano = anos.id INNER JOIN trimestres ON provas.trimestre = trimestres.id WHERE provas.id = $id ORDER BY provas.ano, provas.trimestre;")->getRow(),
            'notas' => $this->db->query("SELECT alunos.numero, alunos.id aluno, notas.valor, notas.prova FROM alunos LEFT JOIN notas ON alunos.id = notas.aluno WHERE notas.prova = $id;")->getResult(),
            'alunos' => $this->db->query("SELECT * FROM `alunos` WHERE curso = $prova->curso AND $prova->ano")->getResult(),
        ];
        return view('componentes/header') . view('componentes/sider') . view('escolar/perfil/prova', $data) . view('componentes/footer');
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
            'ano' => $this->request->getPost('ano'), 
            'disciplina' => $this->request->getPost('disciplina'), 
            'trimestre' => $this->request->getPost('trimestre'),
            'criadopor' => $user->id,
        ];

        cleanarray($data);

        $resposta = cadastronormal($this->provaModel, $data, $this->db, $this->auditoriaModel);
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
            'ano' => $this->request->getPost('ano'),
            'disciplina' => $this->request->getPost('disciplina'),
            'trimestre' => $this->request->getPost('trimestre'),
            'criadopor' => $user->id,
        ];

        cleanarray($data);

        $resposta = updatenomal($this->provaModel, $data, $this->auditoriaModel);
        if ($resposta['code'] !== 200) {
            return $this->respond(returnVoid($resposta, (int) 400), 400);
        }

        return $this->respond($resposta, 200);
    }


    /**
     * TUDO: adicionar uma função para saber se já efixte a nota
     * quando já existe uma nota, temos apenas de editar a nota
     * se ainda nao existe a nota, temos de adicionar.
     */
    public function setNota()
    {
        helper('funcao');
        $user = getUserToken();

        if ($user->id != 1) {
            return $this->respond(returnVoid([], (int) 400), 400, 'Apenas utilizador autorizado');
        }

        $idAluno = $this->request->getPost('aluno');
        $valor = $this->request->getPost('value');
        $prova = $this->request->getPost('prova'); 
        $id = $this->request->getPost('id');
       
        $data = [
            'id' => $id,
            'aluno' => $idAluno, 
            'prova' => $prova, 
            'valor' => $valor,
            'criadopor' => $user->id
        ];
        if ($id == 'null') {
            $data = [
                'aluno' => $idAluno,
                'prova' => $prova,
                'valor' => $valor,
                'criadopor' => $user->id
            ];
            cleanarray($data);
            $resposta = cadastronormal($this->notaModel, $data, $this->db, $this->auditoriaModel);
        }else{
            cleanarray($data);
            $resposta = updatenomal($this->notaModel, $data, $this->auditoriaModel);
        }
       
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

        deletarnormal($id, $this->db, $this->provaModel, $user->id, $this->auditoriaModel);
        return $this->respond([], 200);
    }
}
