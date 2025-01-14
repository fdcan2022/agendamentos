<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblUnits extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 70,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 14,
                'comment' => '(99) 99999-9999',
            ],
            'coordinator' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'comment' => 'Coordenador',
            ],

            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],

            'service' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
                'default' => null,
                'comment' => 'Serviço prestado',
            ],

            'starttime' => [
                'type' => 'VARCHAR',
                'constraint' => 6,
               'comment' => 'Horário de início da undade, e horarios disponives, ex 08:00',
            ],

            'endtime' => [
                'type' => 'VARCHAR',
                'constraint' => 6,
                'comment' => 'Horário de término da undade, e horarios disponives, ex 08:00',
            ],
            'servicetime' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'comment' => 'tempo para atender o cliente,ex, 1 houra',
            ],
            'active' => [
                'type' => 'boolean',
                'constraint' => 1,
                'default' => 0,
                'comment' => '1 ativo, 0 inativo',
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('name');
        $this->forge->addKey('email');
        $this->forge->addKey('phone');
        $this->forge->createTable('units');
    }

    public function down()
    {
        $this->forge->dropTable('units');
    }
}
