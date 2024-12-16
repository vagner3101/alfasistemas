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

        if ($user && !$user->empresa_id) {
            return redirect()->to(route_to('configura.empresa'))->with('error', 'Por favor, configure sua empresa primeiro.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Não é necessário fazer nada após a requisição
    }
}
