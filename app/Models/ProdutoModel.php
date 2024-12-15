<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'produtos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'codigo',
        'nome',
        'producao',
        'tipo_venda',
        'valor_custo',
        'valor_venda',
        'lucro_estimado',
        'quantidade',
        'impressao',
        'material',
        'valor_minimo',
        'largura_maxima',
        'prazo_producao',
        'estoque_atual',
        'estoque_minimo',
        'fornecedor_id',
        'link_produto_fornecedor',
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
        'codigo' => 'required|max_length[50]',
        'nome' => 'required|max_length[255]',
        'producao' => 'required|in_list[propria,terceirizado,revenda,servico]',
        'tipo_venda' => 'required|in_list[quantidade,metro_quadrado]',
        'valor_custo' => 'required|numeric',
        'valor_venda' => 'required|numeric',
        'lucro_estimado' => 'required|numeric',
        'quantidade' => 'required|integer',
        'estoque_atual' => 'required|integer',
        'estoque_minimo' => 'required|integer',
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
