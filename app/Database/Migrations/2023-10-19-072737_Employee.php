<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employee extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true, // agar angkanya positiv terus
                'auto_increment' => true, // AI
            ],
            'nama_pegawai'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
                'null' => TRUE
            ],
            'username'       => [
                'type'           => 'TEXT',
                'constraint'     => '50',
                'null' => TRUE
            ],
            'email'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
                'null' => TRUE
            ],
            'password'       => [
                'type'           => 'TEXT',
                'null' => TRUE
            ],
            'nohp'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
                'null' => TRUE
            ],
            'created_at'       => [
                'type'           => 'DATETIME',
                'null' => TRUE
            ],

            'update_at'       => [
                'type'           => 'DATETIME',
                'null' => TRUE
            ]
        ]);
        $this->forge->addKey('id', true); //primary key nya adalah id
        $this->forge->createTable('employee'); //nama table
    }

    public function down()
    {
        //
        $this->forge->dropTable('employee');
    }
}
