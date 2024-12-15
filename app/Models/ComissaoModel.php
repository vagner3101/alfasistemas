<?php

namespace App\Models;

use CodeIgniter\Model;

class ComissaoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'comissoes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'pedido_id', 'valor_comissao', 'data_comissao', 'status'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'user_id' => 'required|integer|is_not_unique[users.id]',
        'pedido_id' => 'required|integer|is_not_unique[pedidos.id]',
        'valor_comissao' => 'required|numeric',
        'data_comissao' => 'required|valid_date',
        'status' => 'required|in_list[pendente,pago,cancelado]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
