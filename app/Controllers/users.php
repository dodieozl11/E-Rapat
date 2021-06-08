<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
 
class Users extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\user_model';

    public function __construct(){
        $this->validation =  \Config\Services::validation();
    }

    public function index()
    {
        return $this->respond($this->model->findAll(), 200);
    }

    public function create(){
    $validation =  \Config\Services::validation();
 
    $role     = $this->request->getPost('role_user');
    $username = $this->request->getPost('username_user');
    $password = $this->request->getPost('password_user');
    $email    = $this->request->getPost('email_user');
    $wa       = $this->request->getPost('wa_user');
     
    $data = [
        'role_user'     => $role,
        'username_user' => $username,
        'password_user' => $password,
        'email_user'    => $email,
        'wa_user'       => $wa

    ];
     
    if($validation->run($data, 'user') == FALSE){
        $response = [
            'status' => 500,
            'error' => true,
            'data' => $validation->getErrors(),
        ];
        return $this->respond($response, 500);
    } else {
        $simpan = $this->model->insertUser($data);
        if($simpan){
            $msg = ['message' => 'user berhasil dibuat'];
            $response = [
                'status' => 200,
                'error' => false,
                'data' => $msg,
            ];
            return $this->respond($response, 200);
        }
    }
}
        public function show($id = NULL)
        {
        $get = $this->model->getUser($id);
        if($get){
            $code = 200;
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $get,
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'User tidak ditemukan'];
            $response = [
                'status' => $code,
                'error' => true,
                'data' => $msg,
            ];
        }
        return $this->respond($response, $code);
        }
 
        public function update($id = NULL)
        {
        $validation =  \Config\Services::validation();
        $role     = $this->request->getRawInput('role_user');
        $username = $this->request->getRawInput('username_user');
        $password = $this->request->getRawInput('password_user');
        $email    = $this->request->getRawInput('email_user');
        $wa       = $this->request->getRawInput('wa_user');
        $data = [
            'role_user'     => $role,
            'username_user' => $username,
            'password_user' => $password,
            'email_user'    => $email,
            'wa_user'       => $wa
        ];
        if($validation->run($data, 'user') == FALSE){
            $response = [
                'status' => 500,
                'error' => true,
                'data' => $validation->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {
            $simpan = $this->model->updateUser($data,$id);
            if($simpan){
                $msg = ['message' => 'User berhasil di update '];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg,
                ];
                return $this->respond($response, 200);
            }
        }
        }

        public function delete($id = NULL)
        {
        $hapus = $this->model->deleteUser($id);
        if($hapus){
            $code = 200;
            $msg = ['message' => 'User Berhasil di Hapus'];
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $msg,
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'Not Found'];
            $response = [
                'status' => $code,
                'error' => true,
                'data' => $msg,
            ];
        }
        return $this->respond($response, $code);
        }
}   