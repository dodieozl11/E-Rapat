<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class rapat_model extends Model {
 
    protected $table = 'rapats';
 
    public function getRapat($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id_rapat' => $id])->getRowArray();
        }  
    }
     
    public function insertRapat($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
 
    public function updateRapat($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_rapat' => $id]);
    }
 
    public function deleteRapat($id)
    {
        return $this->db->table($this->table)->delete(['id_rapat' => $id]);
    }
} 