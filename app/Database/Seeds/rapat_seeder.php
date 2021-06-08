<?php namespace App\Database\Seeds;
  
class rapat_seeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data1 = [
            'tanggal_rapat'     => '2021-03-20',
            'agenda_rapat'      => 'Pembahasan anak anak',
            'status_rapat'      => 'Menunggu persetujuan'

        ];
        $data2 = [
            'tanggal_rapat'     => '2021-03-21',
            'agenda_rapat'      => 'Pembahasan bapak bapak',
            'status_rapat'      => 'cancel'
        ];
        $this->db->table('rapats')->insert($data1);
        $this->db->table('rapats')->insert($data2);
    }
} 