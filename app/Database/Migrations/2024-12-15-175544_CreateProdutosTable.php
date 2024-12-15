<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProdutosTable extends Migration
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
            'codigo' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'producao' => [
                'type' => 'ENUM',
                'constraint' => ['propria', 'terceirizado', 'revenda', 'servico'],
                'default' => 'propria',
            ],
            'tipo_venda' => [
                'type' => 'ENUM',
                'constraint' => ['quantidade', 'metro_quadrado'],
                'default' => 'quantidade',
            ],
            'valor_custo' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'valor_venda' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'lucro_estimado' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'quantidade' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'impressao' => [
                'type' => 'ENUM',
                'constraint' => ['4x4', '4x1', '4x0', '1x1', '1x0'],
                'null' => true,
            ],
            'material' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'valor_minimo' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'largura_maxima' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'prazo_producao' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'estoque_atual' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'estoque_minimo' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'fornecedor_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'link_produto_fornecedor' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
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
        $this->forge->addForeignKey('fornecedor_id', 'fornecedores', 'id', 'SET NULL', 'SET NULL');
        $this->forge->addForeignKey('empresa_id', 'empresas', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('produtos');
    }

    public function down()
    {
        $this->forge->dropTable('produtos');
    }
}
