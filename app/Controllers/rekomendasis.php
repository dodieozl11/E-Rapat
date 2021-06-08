<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
 
class Rekomendasis extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\rekomendasi_model';

    public function index()
    {
        return $this->respond($this->model->findAll(), 200);
    }

    public function create(){
    $validation =  \Config\Services::validation();
 
    $tindak_lanjut = $this->request->getPost('tindak_lanjut');
     
    $data = [
        'tindak_lanjut'     => $tindak_lanjut,

    ];
     
    if($validation->run($data, 'rekomendasi') == FALSE){
        $response = [
            'status' => 500,
            'error' => true,
            'data' => $validation->getErrors(),
        ];
        return $this->respond($response, 500);
    } else {
        $simpan = $this->model->insertRekomendasi($data);
        if($simpan){
            $msg = ['message' => 'Rekomendasi berhasil dibuat'];
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
        $get = $this->model->getRekomendasi($id);
        if($get){
            $code = 200;
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $get,
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'Rekomendasi tidak ditemukan'];
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
        $tindak_lanjut     = $this->request->getRawInput('tindak_lanjut');
        $data = [
            'tindak_lanjut'     => $tindak_lanjut,
        ];
        if($validation->run($data, 'rekomendasi') == FALSE){
            $response = [
                'status' => 500,
                'error' => true,
                'data' => $validation->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {
            $simpan = $this->model->updateRekomendasi($data,$id);
            if($simpan){
                $msg = ['message' => 'Rekomendasi berhasil di update '];
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
        $hapus = $this->model->deleteRekomendasi($id);
        if($hapus){
            $code = 200;
            $msg = ['message' => 'Rekomendasi Berhasil di Hapus'];
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $msg,
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'Rekomendasi tidak ditemukan'];
            $response = [
                'status' => $code,
                'error' => true,
                'data' => $msg,
            ];
        }
        return $this->respond($response, $code);
        }
}   