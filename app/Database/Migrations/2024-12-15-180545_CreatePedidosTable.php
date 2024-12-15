<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePedidosTable extends Migration
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
            'numero_pedido' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'cliente_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'status_pedido_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'forma_pagamento_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'forma_entrega_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'canal_venda_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'valor_total' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'desconto' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0,
            ],
            'acrescimo' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0,
            ],
            'valor_final' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'observacoes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'data_pedido' => [
                'type' => 'DATE',
            ],
            'data_entrega' => [
                'type' => 'DATE',
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
        $this->forge->addForeignKey('cliente_id', 'clientes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('status_pedido_id', 'status_pedidos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('forma_pagamento_id', 'formas_pagamentos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('forma_entrega_id', 'formas_entrega', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('canal_venda_id', 'canal_vendas', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('empresa_id', 'empresas', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pedidos');
    }

    public function down()
    {
        $this->forge->dropTable('pedidos');
    }
}
