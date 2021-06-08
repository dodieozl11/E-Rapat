<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notulens extends Migration
{
        public function up()
        {
                $this->forge->addField([
                        'id_notulen'          => [
                                'type'           => 'INT',
                                'constraint'     => 2,
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'deskripsi_notulen' => [
                                'type' => 'TEXT',
                                'null' => true,
                        ],
                        'status_notulen'       => [
                                'type'       => 'VARCHAR',
                                'constraint' => '50'
                        ],
                        
                ]);
                $this->forge->addKey('id_notulen', true);
                $this->forge->addForeignKey('id_notulen', 'rapats', 'id_rapat');
                $this->forge->createTable('notulens');
        }

        public function down()
        {
                $this->forge->dropTable('notulens');
        }
}