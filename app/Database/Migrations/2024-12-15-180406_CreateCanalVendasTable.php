<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCanalVendasTable extends Migration
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
            'descricao' => [
                'type' => 'TEXT',
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
        $this->forge->createTable('canal_vendas');
    }

    public function down()
    {
        $this->forge->dropTable('canal_vendas');
    }
}
