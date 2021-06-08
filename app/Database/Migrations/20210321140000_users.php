<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
        public function up()
        {
                $this->forge->addField([
                        'id_user'                => [
                                'type'           => 'INT',
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'role_user'              => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '15',
                        ],
                        'username_user' => [
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ],
                        'password_user' => [
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ],
                        'email_user' => [
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ],
                        'wa_user' => [
                                'type' => 'VARCHAR',
                                'constraint' => '12',
                        ],
                ]);
                $this->forge->addKey('id_user', true);
                $this->forge->createTable('users');
        }

        public function down()
        {
                $this->forge->dropTable('users');
        }
}