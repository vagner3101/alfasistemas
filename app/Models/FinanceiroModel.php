<?php

namespace App\Models;

use CodeIgniter\Model;

class FinanceiroModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'financeiro';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'pedido_id',
        'tipo',
        'valor',
        'data_vencimento',
        'data_pagamento',
        'status',
        'forma_pagamento_id',
        'observacoes',
        'empresa_id'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'pedido_id' => 'required|integer|is_not_unique[pedidos.id]',
        'tipo' => 'required|in_list[entrada,saida]',
        'valor' => 'required|numeric',
        'data_vencimento' => 'required|valid_date',
        'data_pagamento' => 'permit_empty|valid_date',
        'status' => 'required|in_list[pendente,pago,atrasado,cancelado]',
        'forma_pagamento_id' => 'required|integer|is_not_unique[formas_pagamentos.id]',
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
