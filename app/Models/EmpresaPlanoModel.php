<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpresaPlanoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'empresas_planos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['empresa_id', 'plano_id', 'data_inicio', 'data_fim', 'status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'empresa_id' => 'required|integer|is_not_unique[empresas.id]',
        'plano_id' => 'required|integer|is_not_unique[planos.id]',
        'data_inicio' => 'required|valid_date',
        'data_fim' => 'permit_empty|valid_date',
        'status' => 'required|in_list[ativo,inativo,cancelado]',
    ];
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
