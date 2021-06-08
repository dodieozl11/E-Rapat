<?php namespace App\Database\Seeds;
  
class user_seeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data1 = [
            'role_user'         => 'Super Admin',
            'username_user'     => 'Dodie',
            'password_user'     => '123456789',
            'email_user'        => 'dodieozl11@gmail.com',
            'wa_user'           => '085100009456'

        ];
        $data2 = [
            'role_user'         => 'Admin',
            'username_user'     => 'dave',
            'password_user'     => '987654321',
            'email_user'        => 'dave@gmail.com',
            'wa_user'           => '085858585858'
        ];
        $this->db->table('users')->insert($data1);
        $this->db->table('users')->insert($data2);
    }
} 