<?php

namespace App\Controllers\App;

use CodeIgniter\Controller;
use App\Models\EmpresaModel;

class Appindex extends Controller
{
    public function index()
    {
        $data = [
            'empresa_nome' => 'Não definido',
            'empresa_id' => null,
            'empresa_data' => null,
            'debug_info' => []
        ];

        $user = auth()->user();
        $data['debug_info']['user'] = $user ? 'Usuário autenticado' : 'Usuário não autenticado';
        $data['debug_info']['user_id'] = $user ? $user->id : 'N/A';
        $data['debug_info']['user_empresa_id'] = $user ? ($user->empresa_id ?? 'Não definido') : 'N/A';

        $empresaModel = new EmpresaModel();
        $data['debug_info']['empresa_model'] = 'EmpresaModel instanciado';

        if ($user) {
            $empresa_id = $user->empresa_id ?? null;
            $data['empresa_id'] = $empresa_id;
            $data['debug_info']['empresa_id_from_user'] = $empresa_id;

            if ($empresa_id) {
                $empresa = $empresaModel->find($empresa_id);
                $data['debug_info']['empresa_query'] = $empresaModel->getLastQuery()->getQuery();

                if ($empresa) {
                    $data['empresa_nome'] = $empresa['nome'] ?? 'Nome não encontrado';
                    $data['empresa_data'] = $empresa;
                    $data['debug_info']['empresa_encontrada'] = 'Sim';
                } else {
                    $data['empresa_nome'] = 'Empresa não encontrada';
                    $data['debug_info']['empresa_encontrada'] = 'Não';
                }
            } else {
                $data['empresa_nome'] = 'Usuário sem empresa associada';
            }
        } else {
            $data['empresa_nome'] = 'Usuário não autenticado';
        }

        $data['debug_info']['final_empresa_nome'] = $data['empresa_nome'];
        $data['debug_info']['final_empresa_id'] = $data['empresa_id'];

        // Adiciona informação da tabela empresas
        $data['debug_info']['todas_empresas'] = $empresaModel->findAll();

        return view('App/index', $data);
    }
}
