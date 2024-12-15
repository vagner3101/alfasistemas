<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFormasPagamentosTable extends Migration
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
            'forma_pagamento' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'prazo_pagamento' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'desconto' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => true,
            ],
            'acrescimo' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
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
        $this->forge->createTable('formas_pagamentos');
    }

    public function down()
    {
        $this->forge->dropTable('formas_pagamentos');
    }
}
