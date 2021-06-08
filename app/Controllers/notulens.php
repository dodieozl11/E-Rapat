<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
 
class Notulens extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\notulen_model';

    public function index()
    {
        return $this->respond($this->model->findAll(), 200);
    }

    public function create(){
    $validation =  \Config\Services::validation();
 
    $deskripsi     = $this->request->getPost('deskripsi_notulen');
    $status        = $this->request->getPost('status_notulen');
     
    $data = [
        'deskripsi_notulen'     => $deskripsi,
        'status_notulen'        => $status

    ];
     
    if($validation->run($data, 'notulen') == FALSE){
        $response = [
            'status' => 500,
            'error' => true,
            'data' => $validation->getErrors(),
        ];
        return $this->respond($response, 500);
    } else {
        $simpan = $this->model->insertNotulen($data);
        if($simpan){
            $msg = ['message' => 'Notulen berhasil dibuat'];
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
        $get = $this->model->getNotulen($id);
        if($get){
            $code = 200;
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $get,
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'Notulen tidak ditemukan'];
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
        $deskripsi     = $this->request->getRawInput('deskripsi_notulen');
        $status        = $this->request->getRawInput('status_notulen');
        $data = [
            'deskripsi_notulen'     => $deskripsi,
            'status_notulen'        => $status
        ];
        if($validation->run($data, 'notulen') == FALSE){
            $response = [
                'status' => 500,
                'error' => true,
                'data' => $validation->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {
            $simpan = $this->model->updateNotulen($data,$id);
            if($simpan){
                $msg = ['message' => 'Notulen berhasil di update '];
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
        $hapus = $this->model->deleteNotulen($id);
        if($hapus){
            $code = 200;
            $msg = ['message' => 'Notulen Berhasil di Hapus'];
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $msg,
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'Notulen tidak ditemukan'];
            $response = [
                'status' => $code,
                'error' => true,
                'data' => $msg,
            ];
        }
        return $this->respond($response, $code);
        }
}   