<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
 
class Rapats extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\rapat_model';

    public function index()
    {
        return $this->respond($this->model->findAll(), 200);
    }

    public function create(){
    $validation =  \Config\Services::validation();
 
    $tanggal  = $this->request->getPost('tanggal_rapat');
    $agenda   = $this->request->getPost('agenda_rapat');
    $status   = $this->request->getPost('status_rapat');
    
    $data = [
        'tanggal_rapat'     => $tanggal,
        'agenda_rapat'      => $agenda,
        'status_rapat'      => $status,

    ];
     
    if($validation->run($data, 'rapat') == FALSE){
        $response = [
            'status' => 500,
            'error' => true,
            'data' => $validation->getErrors(),
        ];
        return $this->respond($response, 500);
    } else {
        $simpan = $this->model->insertRapat($data);
        if($simpan){
            $msg = ['message' => 'Agenda Rapat berhasil dibuat'];
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
        $get = $this->model->getRapat($id);
        if($get){
            $code = 200;
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $get,
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'Rapat tidak ditemukan'];
            $response = [
                'status' => $code,
                'error' => true,
                'data' => $msg,
            ];
        }
        return $this->respond($response, $code);
        }
        
        public function edit($id = NULL)
        {
        $get = $this->model->getRapat($id);
        if($get){
            $code = 200;
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $get,
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

        public function update($id = NULL)
        {
        $validation =  \Config\Services::validation();
        $tanggal  = $this->request->getRawInput('tanggal_rapat');
        $agenda   = $this->request->getRawInput('agenda_rapat');
        $status   = $this->request->getRawInput('status_rapat');
        $data = [
            'tanggal_rapat'     => $tanggal,
            'agenda_rapat'      => $agenda,
            'status_rapat'      => $status,
        ];
        if($validation->run($data, 'rapat') == FALSE){
            $response = [
                'status' => 500,
                'error' => true,
                'data' => $validation->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {
            $simpan = $this->model->updateRapat($data,$id);
            if($simpan){
                $msg = ['message' => 'Rapat berhasil di update '];
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
        $hapus = $this->model->deleteRapat($id);
        if($hapus){
            $code = 200;
            $msg = ['message' => 'Rapat Berhasil di Hapus'];
            $response = [
                'status' => $code,
                'error' => false,
                'data' => $msg,
            ];
        } else {
            $code = 401;
            $msg = ['message' => 'Rapat tidak di temukan'];
            $response = [
                'status' => $code,
                'error' => true,
                'data' => $msg,
            ];
        }
        return $this->respond($response, $code);
        }
}   