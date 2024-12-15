<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmpresasPlanosTable extends Migration
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
            'empresa_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'plano_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'data_inicio' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'data_fim' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['ativo', 'inativo', 'cancelado'],
                'default' => 'ativo',
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
        $this->forge->addForeignKey('plano_id', 'planos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('empresas_planos');
    }

    public function down()
    {
        $this->forge->dropTable('empresas_planos');
    }
}
