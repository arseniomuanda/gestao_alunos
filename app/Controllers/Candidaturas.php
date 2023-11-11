<?php

namespace App\Controllers;

use App\Models\Auditoria;
use App\Models\CandidatoModel;
use CodeIgniter\RESTful\ResourceController;
use Config\Database;

class Candidaturas extends ResourceController
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

    public function add()
    {
        helper('funcao');

        $atestado_medico = $this->request->getFile('atestado_medico');
        $foto_tipo_pass = $this->request->getFile('foto_tipo_pass');
        $copia_bi = $this->request->getFile('copia_bi');
        $declaracao_notas = $this->request->getFile('declaracao_notas');
        $certificado = $this->request->getFile('certificado');

        $data = [
            'nome' => $this->request->getPost('nome'),
            'bi' => $this->request->getPost('bi'),
            'opcao1' => $this->request->getPost('opcao1'),
            'opcao2' => $this->request->getPost('opcao2'),
            'email' => $this->request->getPost('email'),
            'telefone' => $this->request->getPost('telefone'),
            'datanascimento' => $this->request->getPost('datanascimento'),
            'campanha' => $this->request->getPost('campanha'),
            'criadopor' => 1,
        ];

        cleanarray($data);

        $resposta = cadastrocomcincofotos($this->candidatoModel, $data, $this->db, $this->auditoriaModel, 'Candidato', $atestado_medico, 'atestado_medico', $foto_tipo_pass, 'foto_tipo_pass', $copia_bi, 'copia_bi', $declaracao_notas, 'declaracao_notas', $certificado, 'certificado');
        if ($resposta['code'] !== 200) {
            return $this->respond(returnVoid($resposta, (int) 400), 400);
        }

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

        $resposta = updatecomcincofotos($this->candidatoModel, $id, $user->id, $this->db, $this->auditoriaModel, 'Atualizar Ducumentos do Candidato', $certificado, 'certificado', $foto_tipo_pass, 'foto_tipo_pass', $atestado_medico, 'atestado_medico', $declaracao_notas, 'declaracao_notas', $copia_bi, 'copia_bi', false);

        if ($resposta['code'] !== 200) {
            return $this->respond(returnVoid($resposta, (int) 400), 400);
        }

        return $this->respond($resposta, 200);
    }

    public function updateU($id = null)
    {
        helper('funcao');
        $data = [
            'id' => $id,
            'nome' => $this->request->getPost('nome'),
            'email' => $this->request->getPost('email'),
            'bi' => $this->request->getPost('bi'),
            'opcao1' => $this->request->getPost('opcao1'),
            'opcao2' => $this->request->getPost('opcao2'),
            'telefone' => $this->request->getPost('telefone'),
            'datanascimento' => $this->request->getPost('datanascimento'),
            'campanha' => $this->request->getPost('campanha'),
            'criadopor' => 1,
        ];

        cleanarray($data);

        $resposta = updatenomal($this->candidatoModel, $data, $this->auditoriaModel);
        if ($resposta['code'] !== 200) {
            return $this->respond(returnVoid($resposta, (int) 400), 400);
        }

        return $this->respond($resposta, 200);
    }

    public function update($id = null)
    {
        helper('funcao');
        $user = getUserToken();
        $data = [
            'id' => $id,
            'nome' => $this->request->getPost('nome'),
            'email' => $this->request->getPost('email'),
            'bi' => $this->request->getPost('bi'),
            'opcao1' => $this->request->getPost('opcao1'),
            'opcao2' => $this->request->getPost('opcao2'),
            'telefone' => $this->request->getPost('telefone'),
            'datanascimento' => $this->request->getPost('datanascimento'),
            //'campanha' => $this->request->getPost('campanha'),
            'criadopor' => $user->id,
        ];

        $data = cleanarray($data);

        $resposta = updatenomal($this->candidatoModel, $data, $this->auditoriaModel);
        if ($resposta['code'] !== 200) {
            return $this->respond(returnVoid($resposta, (int) 400), 400);
        }

        return $this->respond($resposta, 200);
    }

    public function updateEstado($id = null)
    {
        helper('funcao');
        $user = getUserToken();
        $data = [
            'id' => $id,
            'estado' => $this->request->getPost('estado'),
            'criadopor' => $user->id,
        ];

        cleanarray($data);

        $resposta = updatenomal($this->candidatoModel, $data, $this->auditoriaModel);
        if ($resposta['code'] !== 200) {
            return $this->respond(returnVoid($resposta, (int) 400), 400);
        }

        return $this->respond($resposta, 200);
    }

    public function index()
    {
        $data = [
            'candidatos' => $this->db->query("SELECT candidatos.*, campanhas.nome campanha, op1.nome AS opcao1, op2.nome AS opcao2 FROM `candidatos` INNER JOIN campanhas ON candidatos.campanha = campanhas.id INNER JOIN cursos AS op1 ON op1.id = candidatos.opcao1 LEFT JOIN cursos AS op2 ON op2.id = candidatos.opcao2 WHERE candidatos.estado <> 3")->getResult()
        ];
        return view('componentes/header') . view('componentes/sider') . view('candidaturas/candidatos', $data) . view('componentes/footer');
    }

    public function perfil($id)
    {
        $data = [
            'candidato' => $row = $this->db->query("SELECT candidatos.*, campanhas.nome campanha, op1.nome AS opcao1, op1.id AS opcao_id1, op2.nome AS opcao2, op2.id AS opcao_id2 FROM `candidatos` INNER JOIN campanhas ON candidatos.campanha = campanhas.id INNER JOIN cursos AS op1 ON op1.id = candidatos.opcao1 LEFT JOIN cursos AS op2 ON op2.id = candidatos.opcao2 WHERE candidatos.id = $id")->getRow(),
            'cursos' => $this->db->query("SELECT `cursos`.*, (SELECT COUNT(*) FROM `alunos` WHERE `curso` = `cursos`.`id`) AS `qtd_alunos` FROM `cursos` WHERE `cursos`.`id` IN ('$row->opcao_id1','$row->opcao_id2')")->getResult(),
        ];
        return view('componentes/header') . view('componentes/sider') . view('candidaturas/candidato_perfil', $data) . view('componentes/footer');
    }

    public function buscarPorBi($id)
    {
        $count = $this->db->query("SELECT COUNT(*) AS total FROM `candidatos` WHERE bi = '$id'")->getRow()->total;
        if($count < 1){
            return $this->respond([], 202, 'Não encontrado!');
        }
        $data = $this->db->query("SELECT * FROM `candidatos` WHERE bi = '$id'")->getRow();
        return $this->respond($data, 200, 'Não encontrado!');
    }

    public function adicionar()
    {
        return;
    }
}
