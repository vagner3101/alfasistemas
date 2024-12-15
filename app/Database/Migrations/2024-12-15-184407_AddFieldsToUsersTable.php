<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldsToUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'after' => 'whatsapp'
            ],
            'sobrenome' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'after' => 'nome'
            ],
            'cpf_cnpj' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'after' => 'sobrenome'
            ],
            'cargo' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'after' => 'cpf_cnpj'
            ],
            'comissionado' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'after' => 'cargo'
            ],
            'comissao' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'default' => 0,
                'after' => 'comissionado'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['nome', 'sobrenome', 'cpf_cnpj', 'cargo', 'comissionado', 'comissao']);
    }
}
