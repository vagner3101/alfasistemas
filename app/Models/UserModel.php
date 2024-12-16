<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class UserModel extends ShieldUserModel
{
    protected function initialize(): void
    {
        parent::initialize();

        $this->allowedFields = [
            ...$this->allowedFields,
            'empresa_id',
            'whatsapp',
            'nome',
            'sobrenome',
            'cpf_cnpj',
            'cargo',
            'comissionado',
            'comissao',
        ];
    }

    protected $validationRules = [
        //'username'     => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username,id,{id}]',
        //'email'        => 'required|valid_email|is_unique[auth_identities.secret,user_id,{id}]',
        //'password'     => 'required|strong_password',
        'empresa_id'   => 'permit_empty|integer',
        'whatsapp'     => 'permit_empty|min_length[10]|max_length[20]',
        'nome'         => 'permit_empty|min_length[2]|max_length[100]',
        'sobrenome'    => 'permit_empty|min_length[2]|max_length[100]',
        'cpf_cnpj'     => 'permit_empty|min_length[11]|max_length[20]',
        'cargo'        => 'permit_empty|min_length[2]|max_length[100]',
        'comissionado' => 'permit_empty|in_list[0,1]',
        'comissao'     => 'permit_empty|decimal',

    ];
}
