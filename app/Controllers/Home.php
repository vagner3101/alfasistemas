<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\EmpresaModel;

class Home extends Controller
{
    public function index()
    {
        $currentDomain = $this->request->getUri()->getHost();
        $mainDomain = env('CentralDomain', 'alfasistemas.test');

        if ($currentDomain === $mainDomain) {
            // Domínio principal - mostrar landing page do sistema
            return view('index2');
        } else {
            // Subdomínio ou domínio personalizado - mostrar landing page da empresa
            $empresaModel = new EmpresaModel();

            // Procura pela correspondência exata no domínio ou subdomínio
            $empresa = $empresaModel->where('dominio', $currentDomain)
                ->orWhere('subdominio', $currentDomain)
                ->first();

            if ($empresa) {
                return view('index', ['empresa' => $empresa]);
            } else {
                // Empresa não encontrada, redireciona para a página de erro
                return redirect()->to('/erro');
            }
        }
    }

    public function erro403()
    {
        return view('error-403');
    }
}
