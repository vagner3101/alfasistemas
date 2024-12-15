<?php

namespace App\Models;

use CodeIgniter\Model;

class FormaPagamentoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'formas_pagamentos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['forma_pagamento', 'prazo_pagamento', 'desconto', 'acrescimo', 'empresa_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'forma_pagamento' => 'required|min_length[3]|max_length[255]',
        'prazo_pagamento' => 'permit_empty|integer',
        'desconto' => 'permit_empty|decimal',
        'acrescimo' => 'permit_empty|decimal',
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
