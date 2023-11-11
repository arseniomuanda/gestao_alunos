<?php

namespace App\Controllers;

use App\Models\Auditoria;
use App\Models\UtilizadoreModel;
use Config\Services;
use CodeIgniter\RESTful\ResourceController;
use Config\Database;
use Firebase\JWT\JWT;
use Firebase\JWT\key;

class Login extends ResourceController
{
    protected $model;
    protected $session;
    protected $db;
    protected $auditoriaModel;

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
        $this->model = new UtilizadoreModel();
        $this->auditoriaModel = new Auditoria();

        $this->session = Services::session();
    }


    public function index()
    {
        return view('login/login');
    }

    private function validar_login($email)
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM " . $this->model->table . " WHERE email = '$email'")->getRow(0)->total;
        if ($query > 0) {
            $data = $this->db->query("SELECT * FROM " . $this->model->table . " WHERE email = '$email';")->getRow(0);
        } else {
            $data = null;
        }
        return $data;
    }

    private function validar_categoria(int $id)
    {
        $cat = $this->db->query("SELECT * FROM utilizadores WHERE id = '$id'")->getRow(0);

        if ($cat->id == 1) {
            return 1;
        }
        $query = $this->db->query("SELECT COUNT(*) AS total FROM funcionarios WHERE utilizador = '$id'")->getRow(0)->total;
        if ($query > 0) {
            $cat = $this->db->query("SELECT * FROM funcionarios WHERE utilizador = '$id'")->getRow(0);
            return $id == 1 ? $cat->id : $cat->categoria;
        } else {
            $query = $this->db->query("SELECT COUNT(*) AS total FROM alunos WHERE utilizador = '$id'")->getRow(0)->total;
            if ($query > 0) {
                return 4;
            } else {
                return 0;
            }
        }
    }

    public function login()
    {
        helper('funcao');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user       = $this->validar_login($email);
        if (!is_null($user)) {
            if (password_verify($password, $user->password)) {

                $id = $user->id;
                $dataLigin = date("Y-m-d H:i:s");

                $acesso = $this->validar_categoria($id);

                $this->auditoriaModel->save([
                    'accao' => 'Login',
                    'processo' => 'Login',
                    'registo' => $user->id,
                    'users' => $user->id,
                    'dataAcao' => date('Y-m-d'),
                    'dataExpiracao' => date("Y-m-d H:i:s'", strtotime("+2 years", strtotime(date("Y-m-d H:i:s")))),
                ]);

                if($acesso == 4){
                    $idAluno = $this->db->query("SELECT * FROM `alunos` WHERE `utilizador` = $user->id")->getRow()->id;
                }

                $key = getenv('JWT_SECRET');
                $issuer_claim = 'THE_CLAIN';
                $audience_claim = 'THE_AUDIENCE';
                $issuedat_claim = time();
                $notbefore_claim = $issuedat_claim + 0;
                $expire_claim = $issuedat_claim + 89000;

                $token = [
                    "iss"  => $issuer_claim,
                    "aud"  => $audience_claim,
                    "iat"  => $issuedat_claim,
                    "nbf"  => $notbefore_claim,
                    "exp"  => $expire_claim,
                    "data" => [
                        'acesso'    => $acesso, // Este acesso vai ser actualizado para vir da base de dados
                        'email'     => $email,
                        'id'        => $user->id,
                        'aluno'        => $acesso == 4 ? $idAluno :null,
                    ]
                ];

                // Gerar Token
                $token = JWT::encode($token, $key, 'HS256');

                $this->db->query("UPDATE " . $this->model->table . " SET `ultimoAcesso`= '$dataLigin',  api_token = '$token' WHERE id = $id");
                $this->auditoriaModel->save([
                    'accao' => 'Reset',
                    'processo' => 'Reset da palavra pass',
                    'registo' => $user->id,
                    'users' => $user->id,
                    'dataAcao' => date('Y-m-d'),
                    'dataExpiracao' => date("Y-m-d H:i:s'", strtotime("+2 years", strtotime(date("Y-m-d H:i:s")))),
                ]);

                $data = [
                    'code'    => 200,
                    'message'   => 'Login successfully',
                    'token'     => $token,
                    'expireAt'  => date('Y-m-d H:i:s', $expire_claim),
                    'now'       => date('Y-m-d H:i:s'),
                    'email'     => $email,
                    'id'        => $user->id,
                    'nome'        => $user->nome,
                    'foto'        => $user->foto,
                    'acesso'    => $acesso,
                    'aluno'        => $acesso == 4 ? $idAluno : null,
                    'logado'        => true
                ];

                $this->session->set($data);

                return $this->respond($data, 200);
            } else {
                $data = [
                    'code'    => 401,
                    'message'   => 'User não encontrado!'
                ];

                return $this->respond(returnVoid($data, 401), 401);
            }
        } else {
            $data = [
                'code'    => 401,
                'message'   => 'User não encontrado!',
            ];

            return $this->respond(returnVoid($data, 401), 401);
        }
    }

    public function resgatarpass()
    {
        return view('login/resgatar');
    }

    public function logout()
    {
        helper('funcao');
        $user = getUserToken();

        $this->session->destroy();
        $this->db->query("UPDATE " . $this->model->table . " SET `api_token`= '' WHERE id = $user->id");

        return $this->respond([], 200);
    }
}
