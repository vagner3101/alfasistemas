<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusPedidoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'status_pedidos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome', 'descricao', 'mensagem', 'empresa_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'nome' => 'required|min_length[3]|max_length[255]',
        'descricao' => 'permit_empty',
        'mensagem' => 'permit_empty',
        'empresa_id' => 'required|integer|is_not_unique[empresas.id]',
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
