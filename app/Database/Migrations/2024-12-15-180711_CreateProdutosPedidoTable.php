<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProdutosPedidoTable extends Migration
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
            'produto_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'quantidade' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'valor_unitario' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'desconto' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0,
            ],
            'valor_total' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'observacoes' => [
                'type' => 'TEXT',
                'null' => true,
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
        $this->forge->addForeignKey('produto_id', 'produtos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('produtos_pedido');
    }

    public function down()
    {
        $this->forge->dropTable('produtos_pedido');
    }
}
