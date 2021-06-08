<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rekomendasis extends Migration
{
        public function up()
        {
                $this->forge->addField([
                        'id_rekomendasi'         => [
                                'type'           => 'INT',
                                'constraint'     => 2,
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'tindak_lanjut'          => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '15',
                        ],
                ]);
                $this->forge->addKey('id_rekomendasi', true);
                $this->forge->addForeignKey('id_rekomendasi', 'rapats', 'id_rapat');
                $this->forge->createTable('rekomendasis');
        }

        public function down()
        {
                $this->forge->dropTable('rekomendasis');
        }
}