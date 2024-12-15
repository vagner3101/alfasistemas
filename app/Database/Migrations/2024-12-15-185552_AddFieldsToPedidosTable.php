<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsToPedidosTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('pedidos', [
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'after' => 'empresa_id'
            ],
            'quantidade_produtos' => [
                'type' => 'INT',
                'constraint' => 11,
                'after' => 'canal_venda_id'
            ],
            'custo_estimado' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'after' => 'quantidade_produtos'
            ],
            'lucro_estimado' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'after' => 'custo_estimado'
            ],
            'prazo_total' => [
                'type' => 'INT',
                'constraint' => 11,
                'after' => 'valor_final'
            ],
            'observacoes_internas' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'observacoes'
            ],
        ]);

        // Adicionando a chave estrangeira para user_id
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'SET NULL');
    }

    public function down()
    {
        // Removendo a chave estrangeira
        $this->forge->dropForeignKey('pedidos', 'pedidos_user_id_foreign');

        // Removendo as colunas
        $this->forge->dropColumn('pedidos', [
            'user_id',
            'quantidade_produtos',
            'custo_estimado',
            'lucro_estimado',
            'prazo_total',
            'observacoes_internas'
        ]);
    }
}
