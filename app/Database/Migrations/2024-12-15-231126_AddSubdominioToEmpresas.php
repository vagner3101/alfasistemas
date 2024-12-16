<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSubdominioToEmpresas extends Migration
{
    public function up()
    {
        $this->forge->addColumn('empresas', [
            'subdominio' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
                'after' => 'dominio'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('empresas', 'subdominio');
    }
}
