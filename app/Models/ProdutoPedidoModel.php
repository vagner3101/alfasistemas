<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoPedidoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'produtos_pedido';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'pedido_id',
        'produto_id',
        'quantidade',
        'valor_unitario',
        'desconto',
        'valor_total',
        'observacoes'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'pedido_id' => 'required|integer|is_not_unique[pedidos.id]',
        'produto_id' => 'required|integer|is_not_unique[produtos.id]',
        'quantidade' => 'required|numeric',
        'valor_unitario' => 'required|numeric',
        'desconto' => 'permit_empty|numeric',
        'valor_total' => 'required|numeric',
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
