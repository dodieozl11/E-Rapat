<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class rekomendasi_model extends Model {
 
    protected $table = 'rekomendasis';
 
    public function getRekomendasi($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id_rekomendasi' => $id])->getRowArray();
        }  
    }
     
    public function insertRekomendasi($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
 
    public function updateRekomendasi($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_rekomendasi' => $id]);
    }
 
    public function deleteRekomendasi($id)
    {
        return $this->db->table($this->table)->delete(['id_rekomendasi' => $id]);
    }
} 