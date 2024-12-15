<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmpresasTable extends Migration
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
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'razao_social' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'cpf_cnpj' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'cep' => [
                'type' => 'VARCHAR',
                'constraint' => 9,
            ],
            'rua' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'numero' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'bairro' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'complemento' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'cidade' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'estado' => [
                'type' => 'CHAR',
                'constraint' => 2,
            ],
            'whatsapp' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'instagram' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'website' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'logo_sistema' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'logo_sistema_pequeno' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'logo_pedidos' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'plano_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'dominio' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'numero_inicial_pedidos' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 1,
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
        $this->forge->addUniqueKey('cpf_cnpj');
        $this->forge->addUniqueKey('dominio');
        $this->forge->createTable('empresas');
    }

    public function down()
    {
        $this->forge->dropTable('empresas');
    }
}
