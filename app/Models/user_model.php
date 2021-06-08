<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class user_model extends Model {
 
    protected $table = 'users';
 
    public function getUser($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id_user' => $id])->getRowArray();
        }  
    }
     
    public function insertUser($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
 
    public function updateUser($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_user' => $id]);
    }
 
    public function deleteUser($id)
    {
        return $this->db->table($this->table)->delete(['id_user' => $id]);
    }
} 