<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClientesTable extends Migration
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
            'whatsapp' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'tipo_cliente' => [
                'type' => 'ENUM',
                'constraint' => ['pessoa_fisica', 'pessoa_juridica'],
                'default' => 'pessoa_fisica',
            ],
            'cpf_cnpj' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
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
            'limite_credito' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'pagar_retirada' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
            ],
            'observacoes' => [
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
        $this->forge->createTable('clientes');
    }

    public function down()
    {
        $this->forge->dropTable('clientes');
    }
}
