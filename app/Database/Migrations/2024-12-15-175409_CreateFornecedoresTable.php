<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFornecedoresTable extends Migration
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
            'tipo_fornecedor' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'cpf_cnpj' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'site' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'whatsapp' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'telefone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'cep' => [
                'type' => 'VARCHAR',
                'constraint' => 9,
            ],
            'rua' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'numero' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'bairro' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'complemento' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'cidade' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'estado' => [
                'type' => 'CHAR',
                'constraint' => 2,
            ],
            'observacoes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'prazo_pagamento' => [
                'type' => 'INT',
                'constraint' => 11,
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
        $this->forge->createTable('fornecedores');
    }

    public function down()
    {
        $this->forge->dropTable('fornecedores');
    }
}
