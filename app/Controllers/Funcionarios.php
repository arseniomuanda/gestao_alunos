<?php

namespace App\Controllers;

use App\Models\Auditoria;
use App\Models\FuncionarioModel;
use App\Models\UtilizadoreModel;
use CodeIgniter\RESTful\ResourceController;
use Config\Database;

class Funcionarios extends ResourceController
{
    protected $db;
    protected $auditoriaModel;
    protected $funcionarioModel;
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
        $this->funcionarioModel = new FuncionarioModel();
        $this->utilizadorModel = new UtilizadoreModel();
    }

    public function index()
    {
        $data = [
            'funcionarios' => $this->db->query("SELECT funcionarios.*, categorias.nome AS categoria, utilizadores.nome, utilizadores.bi, utilizadores.sexo FROM `funcionarios` INNER JOIN `utilizadores` ON funcionarios.utilizador = utilizadores.id INNER JOIN categorias ON funcionarios.categoria = categorias.id")->getResult()
        ];
        return view('componentes/header') . view('componentes/sider') . view('rh/lista', $data) . view('componentes/footer');
    }

    public function adicionar()
    {
        return view('componentes/header') . view('componentes/sider') . view('rh/adicionar') . view('componentes/footer');
    }

    public function add()
    {
        helper('funcao');
        $user = getUserToken();

        if($user->id != 1){
            return $this->respond(returnVoid([], (int) 400), 400, 'Apenas utilizador autorizado');
        }
        

        $password = $this->request->getPost('password') ?? '1234';
        $password = password_hash($password, PASSWORD_BCRYPT);

        $userData = [
            'password' =>  $password,
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
            'numero' => $this->request->getPost('numero'), 
            'categoria' => $this->request->getPost('categoria'), 
            'utilizador' => $userResult['id'],
            'criadopor' => $user->id
        ];

        cleanarray($data);

        $result = cadastronormal($this->funcionarioModel, $data, $this->db, $this->auditoriaModel);
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

        if($user->id != 1){
            return $this->respond(returnVoid([], (int) 400), 400, 'Apenas utilizador autorizado');
        }

        $func = $this->db->query("SELECT * FROM " . $this->funcionarioModel->table . " WHERE id = $id")->getRow(0);

        $foto = $this->request->getFile('foto');
        $userData = [
            'id' => $func->utilizador, 
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

        $userResult = updatecomumafoto($this->utilizadorModel, $userData, $this->db, $this->auditoriaModel, 'Utilizador', $foto, 'foto');
        if ($userResult['code'] !== 200) {
            $data['product'] = $userResult;
            return $this->respond(returnVoid($userData, (int) 400), 400);
        }

        $data = [
            'id' => $id, 
            'numero' => $this->request->getPost('numero'),
            'criadopor' => $user->id
        ];

        cleanarray($data);

        $result = updatenomal($this->funcionarioModel, $data, $this->auditoriaModel);
        if ($result['code'] !== 200) {
            $data['product'] = $result;
            return $this->respond(returnVoid($data, (int) 400), 400);
        }
        return $this->respond($result, 200);
    }

    public function resetPass($id)
    {
        helper('funcao');
        $user = getUserToken();

        if ($user->id != 1) {
            return $this->respond(returnVoid([], (int) 400), 400, 'Apenas utilizador autorizado');
        }
        $func = $this->db->query("SELECT * FROM " . $this->funcionarioModel->table . " WHERE id = $id")->getRow(0);
        $userData = [
            'id' => $func->utilizador,
            'criadopor' => $user->id
        ];

        $data = password_reset($userData, $this->db, $this->auditoriaModel);
        if ($data['code'] !== 200) {
            $data['product'] = $data;
            return $this->respond(returnVoid($data, (int) 400), 400);
        }
        return $this->respond($data, 200);
    }

    public function newPassword($id)
    {
        helper('funcao');
        $user = getUserToken();

        if ($user->id != 1 || $user == $id) {
            return $this->respond(returnVoid([], (int) 400), 400, 'Apenas utilizador autorizado');
        }
        $func = $this->db->query("SELECT * FROM " . $this->funcionarioModel->table . " WHERE id = $id")->getRow(0);

        $oldPass = $this->request->getPost('oldpass');
        $newPass = $this->request->getPost('newpass');

        $userD = $this->db->query("SELECT * FROM " . $this->utilizadorModel->table . " WHERE id = $func->utilizador")->getRow(0);

        if(password_verify($oldPass, $userD->password)){
            $userData = [
                'id' => $userD->id,
                'password' => $newPass,
                'criadopor' => $user->id
            ];

            $data = password_reset($userData, $this->db, $this->auditoriaModel);
            if ($data['code'] !== 200) {
                $data['product'] = $data;
                return $this->respond(returnVoid($data, (int) 400), 400);
            }
            return $this->respond($data, 200);
        }else{
            return $this->respond(returnVoid([], (int) 401), 401);
        }
        
    }

    public function perfil($id)
    {
        $data = [
            'funcionario' => $this->db->query("SELECT funcionarios.*, categorias.nome AS categoria, utilizadores.nome, utilizadores.email, utilizadores.bi, utilizadores.sexo, utilizadores.telefone, utilizadores.bairro, utilizadores.municipio, utilizadores.rua, utilizadores.n_casa, utilizadores.foto FROM `funcionarios` INNER JOIN `utilizadores` ON funcionarios.utilizador = utilizadores.id INNER JOIN categorias ON funcionarios.categoria = categorias.id WHERE funcionarios.id = $id")->getRow(0)
        ];
        return view('componentes/header') . view('componentes/sider') . view('rh/perfil', $data) . view('componentes/footer');
    }
}
