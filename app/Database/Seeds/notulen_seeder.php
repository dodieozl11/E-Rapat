<?php namespace App\Database\Seeds;
  
class notulen_seeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data1 = [
            'deskripsi_notulen' => 'hasilnya bagus',
            'status_notulen'    => 'tersimpan'

        ];
        $data2 = [
            'deskripsi_notulen' => 'kurang bagus',
            'status_notulen'    => 'gatau dimana'

        ];
        $this->db->table('notulens')->insert($data1);
        $this->db->table('notulens')->insert($data2);
    }
} 