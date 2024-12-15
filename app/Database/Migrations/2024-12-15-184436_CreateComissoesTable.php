<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateComissoesTable extends Migration
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
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'pedido_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'valor_comissao' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'data_comissao' => [
                'type' => 'DATE',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pendente', 'pago', 'cancelado'],
                'default' => 'pendente',
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
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('pedido_id', 'pedidos', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('comissoes');
    }

    public function down()
    {
        $this->forge->dropTable('comissoes');
    }
}
