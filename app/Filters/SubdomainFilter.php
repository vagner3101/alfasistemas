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
        $auth = service('auth');
        $user = $auth->user();
        $empresaModel = new EmpresaModel();

        log_message('debug', "SubdomainFilter: Processing host: {$host}");

        if ($host === $mainDomain) {
            // Domínio principal
            $session->set('is_main_domain', true);
            $session->remove('empresa_id');
            $this->setDefaultEmpresaNome($session, $user);
            log_message('debug', "SubdomainFilter: Main domain accessed");
        } else {
            // Subdomínio ou domínio personalizado
            $session->set('is_main_domain', false);
            $empresa = $empresaModel->where('dominio', $host)->first();
            if (!$empresa) {
                $empresa = $empresaModel->where('subdominio', $host)->first();
            }

            if ($empresa) {
                $session->set('empresa_id', $empresa['id']);
                $session->set('empresa_nome', $empresa['nome']);
                log_message('debug', "SubdomainFilter: Empresa found - ID: {$empresa['id']}, Nome: {$empresa['nome']}");

                if ($user && $user->inGroup('superadmin')) {
                    // Lógica especial para superadmin
                    log_message('debug', "SubdomainFilter: Superadmin accessing empresa {$empresa['id']}");
                } elseif ($user && $user->empresa_id != $empresa['id']) {
                    // Usuário tentando acessar empresa errada
                    log_message('debug', "SubdomainFilter: User {$user->id} attempting to access wrong empresa");
                    return $this->redirectToMainDomain($auth);
                }
            } else {
                log_message('debug', "SubdomainFilter: No empresa found for this domain/subdomain");
                return $this->redirectToMainDomain($auth);
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
        log_message('debug', "SubdomainFilter: Set default empresa nome: " . $session->get('empresa_nome'));
    }

    private function redirectToMainDomain($auth)
    {
        $mainDomain = env('CentralDomain');

        // Desloga o usuário
        $auth->logout();

        // Limpa a sessão
        session()->destroy();

        log_message('debug', "SubdomainFilter: User logged out and redirected to main domain");

        // Adiciona um timestamp como parâmetro de consulta para evitar cache
        $timestamp = time();

        // Redireciona para o domínio principal com o parâmetro de timestamp
        return redirect()->to("http://{$mainDomain}/app?nocache={$timestamp}");
    }
}
