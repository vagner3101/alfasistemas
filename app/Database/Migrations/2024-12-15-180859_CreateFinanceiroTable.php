<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFinanceiroTable extends Migration
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
            'pedido_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tipo' => [
                'type' => 'ENUM',
                'constraint' => ['entrada', 'saida'],
                'default' => 'entrada',
            ],
            'valor' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'data_vencimento' => [
                'type' => 'DATE',
            ],
            'data_pagamento' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pendente', 'pago', 'atrasado', 'cancelado'],
                'default' => 'pendente',
            ],
            'forma_pagamento_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
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
        $this->forge->addForeignKey('pedido_id', 'pedidos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('forma_pagamento_id', 'formas_pagamentos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('empresa_id', 'empresas', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('financeiro');
    }

    public function down()
    {
        $this->forge->dropTable('financeiro');
    }
}
