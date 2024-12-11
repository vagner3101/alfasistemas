<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class SubdomainFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $host = $_SERVER['HTTP_HOST'];

        // Simulação de dados de empresas (subdomínios e domínios personalizados)
        $empresas = [
            'grafica1.alfasistemas.test' => ['id' => 1, 'nome' => 'Gráfica 1'],
            'grafica2.alfasistemas.test' => ['id' => 2, 'nome' => 'Gráfica 2'],
            'grafica1.com.br' => ['id' => 1, 'nome' => 'Gráfica 1'],
            'alfasistemas.test' => ['id' => 3, 'nome' => 'Gráfica 2N'],

        ];

        if (isset($empresas[$host])) {
            $empresa = $empresas[$host];
            // Armazenar os dados da empresa na sessão para uso subsequente
            session()->set('empresa_id', $empresa['id']);
            session()->set('empresa_nome', $empresa['nome']);
        } else {
            // Subdomínio ou domínio personalizado não encontrado, redirecionar para uma página de erro ou página inicial
            return redirect()->to('/erro');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Não é necessário fazer nada aqui
    }
}
