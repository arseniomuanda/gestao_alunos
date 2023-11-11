<?php

namespace App\Controllers;

use App\Models\AlunoModel;
use App\Models\Auditoria;
use App\Models\UtilizadoreModel;
use CodeIgniter\RESTful\ResourceController;
use Config\Database;

class Alunos extends ResourceController
{
    protected $db;
    protected $auditoriaModel;
    protected $alunoModel;
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
        $this->alunoModel = new AlunoModel();
        $this->utilizadorModel = new UtilizadoreModel();
    }

    public function index()
    {
        $data = [
            'alunos' => $this->db->query("SELECT alunos.*, utilizadores.nome, utilizadores.sexo, cursos.nome AS curso, turmas.nome AS turma FROM alunos INNER JOIN utilizadores ON alunos.utilizador = utilizadores.id INNER JOIN cursos ON alunos.curso = cursos.id INNER JOIN turmas ON alunos.turma = turmas.id")->getResult()
        ];
        return view('componentes/header') . view('componentes/sider') . view('escolar/lista/alunos', $data) . view('componentes/footer');
    }

    public function adicionar()
    {
        $data = [
            'candidatos' => [],
            'cursos' => $this->db->query("SELECT * FROM cursos")->getResult()
        ];
        return view('componentes/header') . view('componentes/sider') . view('escolar/adicionar/alunos', $data) . view('componentes/footer');
    }

    public function perfil($id)
    {
        $data = [
            'aluno' => $this->db->query("SELECT alunos.*, utilizadores.nome, utilizadores.sexo, utilizadores.email, utilizadores.bi, utilizadores.telefone, utilizadores.municipio, utilizadores.bairro, utilizadores.rua, utilizadores.n_casa  FROM alunos INNER JOIN utilizadores ON alunos.utilizador = utilizadores.id WHERE alunos.id = $id")->getRow(0),
            'cursos' => $this->db->query("SELECT * FROM cursos")->getResult(),
            'notas_primeiro' => $this->db->query("SELECT alunos.numero, alunos.id aluno, notas.valor, provas.nome,  notas.prova, disciplinas.nome disciplina FROM alunos LEFT JOIN notas ON alunos.id = notas.aluno INNER JOIN provas ON notas.prova = provas.id INNER JOIN disciplinas ON provas.disciplina = disciplinas.id WHERE alunos.id = $id AND provas.trimestre = 1;")->getResult(),
            'notas_segundo' => $this->db->query("SELECT alunos.numero, alunos.id aluno, notas.valor,  provas.nome, notas.prova, disciplinas.nome disciplina FROM alunos LEFT JOIN notas ON alunos.id = notas.aluno INNER JOIN provas ON notas.prova = provas.id INNER JOIN disciplinas ON provas.disciplina = disciplinas.id WHERE alunos.id = $id AND provas.trimestre = 2;")->getResult(),
            'notas_terceiro' => $this->db->query("SELECT alunos.numero, alunos.id aluno, notas.valor, provas.nome,  notas.prova, disciplinas.nome disciplina FROM alunos LEFT JOIN notas ON alunos.id = notas.aluno INNER JOIN provas ON notas.prova = provas.id INNER JOIN disciplinas ON provas.disciplina = disciplinas.id WHERE alunos.id = $id AND provas.trimestre = 3;")->getResult()

        ];
        return view('componentes/header') . view('componentes/sider') . view('escolar/perfil/alunos', $data) . view('componentes/footer');
    }

    public function add()
    {
        helper('funcao');
        $user = getUserToken();

        $certificado = $this->request->getFile('certificado');
        $foto_tipo_pass = $this->request->getFile('foto_tipo_pass');
        $atestado_medico = $this->request->getFile('atestado_medico');
        $declaracao_notas = $this->request->getFile('declaracao_notas');
        $copia_bi = $this->request->getFile('copia_bi');


        $userData = [
            'password' => password_hash($this->request->getPost('bi'), PASSWORD_BCRYPT),
            'email' => $this->request->getPost('email'),
            'bairro' => $this->request->getPost('bairro'),
            'rua' => $this->request->getPost('rua'),
            'municipio' => $this->request->getPost('municipio'),
            'n_casa' => $this->request->getPost('n_casa'),
            'telefone' => $this->request->getPost('telefone'),
            'bi' => $this->request->getPost('bi'),
            'sexo' => $this->request->getPost('sexo'),
            'nome' => $this->request->getPost('nome'),
            'criadopor' => $user->id
        ];

        cleanarray($userData);

        $userResult = cadastronormal($this->utilizadorModel, $userData, $this->db, $this->auditoriaModel);
        if ($userResult['code'] !== 200) {
            $data['product'] = $userResult;
            return $this->respond(returnVoid($userData, (int) 400), 400);
        }

        $data = [
            'nome' => $this->request->getPost('nome'),
            'bi' => $this->request->getPost('bi'),
            'telefone' => $this->request->getPost('telefone'),
            'email' => $this->request->getPost('email'),
            'datanascimento' => $this->request->getPost('datanascimento'),
            'sexo' => $this->request->getPost('sexo'),
            'municipio' => $this->request->getPost('municipio'),
            'bairro' => $this->request->getPost('bairro'),
            'rua' => $this->request->getPost('rua'),
            'n_casa' => $this->request->getPost('n_casa'),
            'nome_pai' => $this->request->getPost('nome_pai'),
            'nome_mae' => $this->request->getPost('nome_mae'),
            'nome_encarregado' => $this->request->getPost('nome_encarregado'),
            'telefone_encarregado' => $this->request->getPost('telefone_encarregado'),
            'curso' => $this->request->getPost('curso'),
            'turma' => $this->request->getPost('turma'),
            'utilizador' => $userResult['id'],
            'dataentrada' => $this->request->getPost('dataentrada'),
            'criadopor' => $user->id
        ];
        $data = cleanarray($data);

        $resposta = cadastrocomcincofotos($this->alunoModel, $data, $this->db, $this->auditoriaModel, 'Cadastrar Aluno', $certificado, 'certificado', $foto_tipo_pass, 'foto_tipo_pass', $atestado_medico, 'atestado_medico', $declaracao_notas, 'declaracao_notas', $copia_bi, 'copia_bi');

        if ($resposta['code'] !== 200) {
            return $this->respond(returnVoid($resposta, (int) 400), 400);
        }

        return $this->respond($resposta, 200);
    }

    public function matricular($id)
    {
        helper('funcao');
        $user = getUserToken();
        $row = $this->db->query("SELECT * FROM `candidatos` WHERE id = $id")->getRow();

        $userData = [
            'password' => password_hash($row->bi, PASSWORD_BCRYPT),
            'email' => $row->email,
            'telefone' => $row->telefone,
            'bi' => $row->bi,
            'nome' => $row->nome,
            'criadopor' => $user->id
        ];

        cleanarray($userData);

        $userResult = cadastronormal($this->utilizadorModel, $userData, $this->db, $this->auditoriaModel);
        if ($userResult['code'] !== 200) {
            $data['product'] = $userResult;
            return $this->respond(returnVoid($userData, (int) 400), 400);
        }

        $data = [
            'nome' => $row->nome,
            'bi' => $row->bi,
            'telefone' => $row->telefone,
            'email' => $row->email,
            'utilizador' => $userResult['id'],
            'criadopor' => $user->id,
            'nome_pai' => $this->request->getPost('nome_pai'),
            'nome_mae' => $this->request->getPost('nome_mae'),
            'nome_encarregado' => $this->request->getPost('nome_encarregado'),
            'telefone_encarregado' => $this->request->getPost('telefone_encarregado'),
            'curso' => $this->request->getPost('curso'),
            'turma' => $this->request->getPost('turma'),
            'dataentrada' => $this->request->getPost('dataentrada'),
        ];

        $data = cleanarray($data);

        $resposta = cadastronormal($this->alunoModel, $data, $this->db, $this->auditoriaModel);

        if ($resposta['code'] !== 200) {
            return $this->respond(returnVoid($resposta, (int) 400), 400);
        }

        $this->db->query("UPDATE `candidatos` SET estado = 3 WHERE id = $id");
        return $this->respond($resposta, 200);
    }


    public function updateImagens($id)
    {
        helper('funcao');
        $user = getUserToken();

        $certificado = $this->request->getFile('certificado');
        $foto_tipo_pass = $this->request->getFile('foto_tipo_pass');
        $atestado_medico = $this->request->getFile('atestado_medico');
        $declaracao_notas = $this->request->getFile('declaracao_notas');
        $copia_bi = $this->request->getFile('copia_bi');

        $resposta = updatecomcincofotos($this->alunoModel, $id, $user->id, $this->db, $this->auditoriaModel, 'Atualizar Ducumentos do Aluno', $certificado, 'certificado', $foto_tipo_pass, 'foto_tipo_pass', $atestado_medico, 'atestado_medico', $declaracao_notas, 'declaracao_notas', $copia_bi, 'copia_bi');

        if ($resposta['code'] !== 200) {
            return $this->respond(returnVoid($resposta, (int) 400), 400);
        }

        return $this->respond($resposta, 200);
    }

    public function actualizar($id)
    {
        helper('funcao');
        $user = getUserToken();

        $aluno = $this->db->query("SELECT * FROM alunos WHERE id = $id")->getRow();


        $userData = [
            'id' => $aluno->utilizador,
            'password' => password_hash($this->request->getPost('bi'), PASSWORD_BCRYPT),
            'email' => $this->request->getPost('email'),
            'bairro' => $this->request->getPost('bairro'),
            'rua' => $this->request->getPost('rua'),
            'municipio' => $this->request->getPost('municipio'),
            'n_casa' => $this->request->getPost('n_casa'),
            'telefone' => $this->request->getPost('telefone'),
            'bi' => $this->request->getPost('bi'),
            'sexo' => $this->request->getPost('sexo'),
            'nome' => $this->request->getPost('nome'),
            'criadopor' => $user->id
        ];

        cleanarray($userData);

        $userResult = updatenomal($this->utilizadorModel, $userData, $this->auditoriaModel);
        if ($userResult['code'] !== 200) {
            $data['product'] = $userResult;
            return $this->respond(returnVoid($userData, (int) 400), 400);
        }

        $data = [
            'id' => $id,
            'nome' => $this->request->getPost('nome'),
            'bi' => $this->request->getPost('bi'),
            'telefone' => $this->request->getPost('telefone'),
            'email' => $this->request->getPost('email'),
            'datanascimento' => $this->request->getPost('datanascimento'),
            'sexo' => $this->request->getPost('sexo'),
            'municipio' => $this->request->getPost('municipio'),
            'bairro' => $this->request->getPost('bairro'),
            'rua' => $this->request->getPost('rua'),
            'n_casa' => $this->request->getPost('n_casa'),
            'nome_pai' => $this->request->getPost('nome_pai'),
            'nome_mae' => $this->request->getPost('nome_mae'),
            'nome_encarregado' => $this->request->getPost('nome_encarregado'),
            'telefone_encarregado' => $this->request->getPost('telefone_encarregado'),
            'curso' => $this->request->getPost('curso'),
            'turma' => $this->request->getPost('turma'),
            'dataentrada' => $this->request->getPost('dataentrada'),
            'criadopor' => $user->id
        ];
        $data = cleanarray($data);

        $resposta = updatenomal($this->alunoModel, $data, $this->auditoriaModel);

        if ($resposta['code'] !== 200) {
            return $this->respond(returnVoid($resposta, (int) 400), 400);
        }

        return $this->respond($resposta, 200);
    }
}
