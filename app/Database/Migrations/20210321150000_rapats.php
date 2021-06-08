<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rapats extends Migration
{
        public function up()
        {
                $this->forge->addField([
                        'id_rapat'          => [
                                'type'           => 'INT',
                                'constraint'     => 2,
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'tanggal_rapat'       => [
                                'type'       => 'DATE',
                                'null'      => true,
                        ],
                        'agenda_rapat' => [
                                'type' => 'TEXT',
                                'null' => true,
                        ],
                        'status_rapat' => [
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        ],
                ]);
                $this->forge->addKey('id_rapat', true);
                $this->forge->addForeignKey('id_rapat', 'users', 'id_user');
                $this->forge->createTable('rapats');
                
        }

        public function down()
        {
                $this->forge->dropTable('rapats');
        }
}