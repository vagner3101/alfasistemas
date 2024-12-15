<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsToUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'empresa_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
                'after' => 'id'
            ],
            'whatsapp' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
                'after' => 'empresa_id'
            ]
        ]);

        // Adicionando a chave estrangeira
        $this->forge->addForeignKey('empresa_id', 'empresas', 'id', 'CASCADE', 'SET NULL');
    }

    public function down()
    {
        // Removendo a chave estrangeira
        $this->forge->dropForeignKey('users', 'users_empresa_id_foreign');

        // Removendo as colunas
        $this->forge->dropColumn('users', ['empresa_id', 'whatsapp']);
    }
}
