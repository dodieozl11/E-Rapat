<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class notulen_model extends Model {
 
    protected $table = 'notulens';
 
    public function getNotulen($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id_notulen' => $id])->getRowArray();
        }  
    }
     
    public function insertNotulen($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
 
    public function updateNotulen($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_notulen' => $id]);
    }
 
    public function deleteNotulen($id)
    {
        return $this->db->table($this->table)->delete(['id_notulen' => $id]);
    }
} 