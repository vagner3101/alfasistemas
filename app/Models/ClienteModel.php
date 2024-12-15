<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'clientes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nome',
        'whatsapp',
        'tipo_cliente',
        'cpf_cnpj',
        'cep',
        'rua',
        'numero',
        'bairro',
        'complemento',
        'cidade',
        'estado',
        'limite_credito',
        'pagar_retirada',
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
        'nome' => 'required|min_length[3]|max_length[255]',
        'whatsapp' => 'required|max_length[20]',
        'tipo_cliente' => 'required|in_list[pessoa_fisica,pessoa_juridica]',
        'cpf_cnpj' => 'required|max_length[20]',
        'cep' => 'required|max_length[9]',
        'rua' => 'required|max_length[255]',
        'numero' => 'required|max_length[20]',
        'bairro' => 'required|max_length[100]',
        'cidade' => 'required|max_length[100]',
        'estado' => 'required|exact_length[2]',
        'limite_credito' => 'permit_empty|numeric',
        'pagar_retirada' => 'required|in_list[0,1]',
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
