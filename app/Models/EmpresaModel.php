<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpresaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'empresas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nome',
        'razao_social',
        'cpf_cnpj',
        'cep',
        'rua',
        'numero',
        'bairro',
        'complemento',
        'cidade',
        'estado',
        'whatsapp',
        'instagram',
        'website',
        'email',
        'logo_sistema',
        'logo_sistema_pequeno',
        'logo_pedidos',
        'plano_id',
        'dominio',
        'numero_inicial_pedidos'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
