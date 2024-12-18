<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTipoEmpresaToEmpresas extends Migration
{
    public function up()
    {
        $this->forge->addColumn('empresas', [
            'tipo_empresa' => [
                'type' => 'ENUM',
                'constraint' => ['PF', 'PJ'],
                'default' => 'PJ',
                'after' => 'nome'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('empresas', 'tipo_empresa');
    }
}
