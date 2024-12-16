<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\EmpresaModel;

class SubdomainFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $host = $_SERVER['HTTP_HOST'];
        $mainDomain = env('CentralDomain');
        $session = session();
        $user = auth()->user();
        $empresaModel = new EmpresaModel();

        if ($host === $mainDomain) {
            // Domínio principal
            $session->set('is_main_domain', true);
            if ($user && $user->empresa_id) {
                $empresa = $empresaModel->find($user->empresa_id);
                if ($empresa) {
                    $session->set('empresa_id', $empresa['id']);
                    $session->set('empresa_nome', $empresa['nome']);
                } else {
                    $session->remove('empresa_id');
                    $this->setDefaultEmpresaNome($session, $user);
                }
            } else {
                $session->remove('empresa_id');
                $this->setDefaultEmpresaNome($session, $user);
            }
        } else {
            // Subdomínio ou domínio personalizado
            $session->set('is_main_domain', false);
            $empresa = $empresaModel->where('subdominio', $host)
                ->orWhere('dominio', $host)
                ->first();

            if ($empresa) {
                $session->set('empresa_id', $empresa['id']);
                $session->set('empresa_nome', $empresa['nome']);
            } else {
                $session->remove('empresa_id');
                $this->setDefaultEmpresaNome($session, $user);
                return redirect()->to('http://' . $mainDomain . '/app');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Não é necessário fazer nada aqui
    }

    private function setDefaultEmpresaNome($session, $user)
    {
        if ($user && $user->inGroup('superadmin')) {
            $session->set('empresa_nome', 'Administração Central');
        } else {
            $session->set('empresa_nome', 'Sistema');
        }
    }
}
