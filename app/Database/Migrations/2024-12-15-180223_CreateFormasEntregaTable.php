<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFormasEntregaTable extends Migration
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
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'prazo' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'valor' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'empresa_id' => [
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
        $this->forge->addForeignKey('empresa_id', 'empresas', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('formas_entrega');
    }

    public function down()
    {
        $this->forge->dropTable('formas_entrega');
    }
}
