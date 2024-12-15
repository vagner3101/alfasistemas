<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePlanosRecursosTable extends Migration
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
            'plano_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'recurso_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('plano_id', 'planos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('recurso_id', 'recursos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('planos_recursos');
    }

    public function down()
    {
        $this->forge->dropTable('planos_recursos');
    }
}
