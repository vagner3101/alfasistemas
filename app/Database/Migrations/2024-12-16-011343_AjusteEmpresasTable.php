<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AjusteEmpresasTable extends Migration
{
    public function up()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');

        // Remover a restrição NOT NULL do campo dominio
        $this->forge->modifyColumn('empresas', [
            'dominio' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);

        // Adicionar a restrição NOT NULL ao campo subdominio
        $this->forge->modifyColumn('empresas', [
            'subdominio' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
        ]);

        // Remover o índice único do dominio
        $this->db->query('ALTER TABLE empresas DROP INDEX dominio');

        // Adicionar índice único ao subdominio
        $this->db->query('ALTER TABLE empresas ADD UNIQUE INDEX subdominio (subdominio)');

        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');
    }

    public function down()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS = 0');

        // Reverter as alterações
        $this->forge->modifyColumn('empresas', [
            'dominio' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
        ]);

        $this->forge->modifyColumn('empresas', [
            'subdominio' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);

        // Remover o índice único do subdominio
        $this->db->query('ALTER TABLE empresas DROP INDEX subdominio');

        // Readicionar índice único ao dominio
        $this->db->query('ALTER TABLE empresas ADD UNIQUE INDEX dominio (dominio)');

        $this->db->query('SET FOREIGN_KEY_CHECKS = 1');
    }
}
