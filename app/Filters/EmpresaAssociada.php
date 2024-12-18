<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class EmpresaAssociada implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $user = auth()->user();
        $session = session();
        $isMainDomain = $session->get('is_main_domain', false);

        log_message('debug', "EmpresaAssociada: Checking user " . ($user ? $user->id : 'Not logged in') . " on " . ($isMainDomain ? 'main domain' : 'subdomain'));

        if ($user && !$user->empresa_id) {
            if ($user->inGroup('superadmin')) {
                log_message('debug', "EmpresaAssociada: Superadmin access allowed without empresa");
                return; // Permite acesso para superadmins mesmo sem empresa associada
            }

            if (!$isMainDomain) {
                log_message('debug', "EmpresaAssociada: User without empresa on subdomain, redirecting to main domain");
                return redirect()->to('http://' . env('CentralDomain') . '/app/empresa')
                    ->with('error', 'Por favor, configure sua empresa primeiro.');
            }

            log_message('debug', "EmpresaAssociada: User without empresa, redirecting to empresa configuration");
            return redirect()->to(route_to('configura.empresa'))
                ->with('error', 'Por favor, configure sua empresa primeiro.');
        }

        log_message('debug', "EmpresaAssociada: Access allowed for user");
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Não é necessário fazer nada após a requisição
    }
}
