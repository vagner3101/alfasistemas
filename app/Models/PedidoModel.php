<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pedidos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'numero_pedido',
        'empresa_id',
        'user_id',
        'cliente_id',
        'status_pedido_id',
        'forma_pagamento_id',
        'forma_entrega_id',
        'canal_venda_id',
        'quantidade_produtos',
        'custo_estimado',
        'lucro_estimado',
        'valor_total',
        'desconto',
        'acrescimo',
        'valor_final',
        'prazo_total',
        'observacoes',
        'observacoes_internas',
        'data_pedido',
        'data_entrega'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'numero_pedido' => 'required|integer',
        'empresa_id' => 'required|integer|is_not_unique[empresas.id]',
        'user_id' => 'required|integer|is_not_unique[users.id]',
        'cliente_id' => 'required|integer|is_not_unique[clientes.id]',
        'status_pedido_id' => 'required|integer|is_not_unique[status_pedidos.id]',
        'forma_pagamento_id' => 'required|integer|is_not_unique[formas_pagamentos.id]',
        'forma_entrega_id' => 'required|integer|is_not_unique[formas_entrega.id]',
        'canal_venda_id' => 'required|integer|is_not_unique[canal_vendas.id]',
        'quantidade_produtos' => 'required|integer',
        'custo_estimado' => 'required|numeric',
        'lucro_estimado' => 'required|numeric',
        'valor_total' => 'required|numeric',
        'desconto' => 'permit_empty|numeric',
        'acrescimo' => 'permit_empty|numeric',
        'valor_final' => 'required|numeric',
        'prazo_total' => 'required|integer',
        'data_pedido' => 'required|valid_date',
        'data_entrega' => 'permit_empty|valid_date',
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
