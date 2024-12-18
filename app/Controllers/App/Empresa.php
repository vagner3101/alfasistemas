<?php

namespace App\Controllers\App;

use CodeIgniter\Controller;
use App\Models\EmpresaModel;

class Empresa extends Controller
{
    protected $empresaModel;

    public function __construct()
    {
        $this->empresaModel = new EmpresaModel();
    }

    public function index()
    {
        $user = auth()->user();
        $session = session();
        $empresa = null;

        if ($user->inGroup('superadmin')) {
            $empresa_id = $session->get('empresa_id');
            if ($empresa_id) {
                $empresa = $this->empresaModel->find($empresa_id);
            }
        } elseif ($user->empresa_id) {
            $empresa = $this->empresaModel->find($user->empresa_id);
        }

        // Extrair apenas o subdomínio para exibição no formulário
        if ($empresa && $empresa['subdominio']) {
            $parts = explode('.', $empresa['subdominio']);
            $empresa['subdominio_display'] = $parts[0];
        }

        $data = [
            'titulo' => 'Configuração da Empresa',
            'empresa' => $empresa
        ];

        return view('App/empresa', $data);
    }

    public function salvar()
    {
        $user = auth()->user();
        $session = session();

        $rules = [
            'nome' => 'required|max_length[255]',
            'tipo_empresa' => 'required|in_list[PF,PJ]',
            'razao_social' => 'required|max_length[255]',
            'cpf_cnpj' => 'required|max_length[20]',
            'cep' => 'required|max_length[9]',
            'rua' => 'required|max_length[255]',
            'numero' => 'required|max_length[20]',
            'bairro' => 'required|max_length[100]',
            'complemento' => 'permit_empty|max_length[255]',
            'cidade' => 'required|max_length[100]',
            'estado' => 'required|max_length[2]',
            'whatsapp' => 'required|max_length[20]',
            'instagram' => 'permit_empty|max_length[100]',
            'website' => 'permit_empty|max_length[255]',
            'email' => 'required|valid_email|max_length[255]',
            'dominio' => 'permit_empty|max_length[255]',
            'subdominio' => 'required|alpha_dash|max_length[255]',
        ];

        $messages = [
            'subdominio' => [
                'required' => 'O subdomínio é obrigatório.',
                'alpha_dash' => 'O subdomínio pode conter apenas letras, números, traços e sublinhados.',
                'max_length' => 'O subdomínio não pode ter mais de 255 caracteres.'
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();

        // Trata o subdomínio e cria a URL completa
        $subdominio = strtolower($data['subdominio']);
        $fullSubdominio = $subdominio . '.' . env('CentralDomain');

        // Verifica se o subdomínio completo já existe
        $existingCompany = $this->empresaModel->where('subdominio', $fullSubdominio)->first();

        // Determina o ID da empresa a ser editada
        $empresa_id = $user->inGroup('superadmin') ? $session->get('empresa_id') : $user->empresa_id;

        // Se encontrou uma empresa com este subdomínio
        if ($existingCompany) {
            // Se não é uma edição (nova empresa) OU 
            // se é uma edição mas o subdomínio pertence a outra empresa
            if (!$empresa_id || $existingCompany['id'] != $empresa_id) {
                return redirect()->back()->withInput()->with('error', 'Este subdomínio já está em uso. Por favor, escolha outro.');
            }
            // Se chegou aqui, é uma edição e o subdomínio pertence à empresa sendo editada
            // Não precisa fazer nada, pode continuar
        } else {
            // O subdomínio não existe, pode ser usado (tanto para nova empresa quanto para edição)
        }

        // Continua com o processo de salvar/atualizar
        $data['subdominio'] = $fullSubdominio;

        try {
            // Processa os uploads de logos
            $logoFields = ['logo_sistema', 'logo_sistema_pequeno', 'logo_pedidos'];
            foreach ($logoFields as $field) {
                $logo = $this->request->getFile($field);
                if ($logo && $logo->isValid() && !$logo->hasMoved()) {
                    $newName = $logo->getRandomName();

                    $empresaFolder = WRITEPATH . 'uploads/logos/' . $subdominio;
                    if (!is_dir($empresaFolder)) {
                        mkdir($empresaFolder, 0777, true);
                    }

                    $logo->move($empresaFolder, $newName);
                    $data[$field] = 'uploads/logos/' . $subdominio . '/' . $newName;

                    // Se for uma atualização, exclui a logo antiga
                    if ($empresa_id) {
                        $oldLogo = $this->empresaModel->find($empresa_id)[$field];
                        if ($oldLogo && file_exists(WRITEPATH . $oldLogo)) {
                            unlink(WRITEPATH . $oldLogo);
                        }
                    }
                } elseif ($empresa_id) {
                    // Mantém a logo existente se nenhuma nova for enviada
                    $existingCompany = $this->empresaModel->find($empresa_id);
                    $data[$field] = $existingCompany[$field];
                }
            }

            if ($empresa_id) {
                $this->empresaModel->update($empresa_id, $data);
                $message = 'Dados da empresa atualizados com sucesso!';
            } else {
                $this->empresaModel->insert($data);
                $new_empresa_id = $this->empresaModel->getInsertID();
                if (!$user->inGroup('superadmin')) {
                    $userModel = model('UserModel');
                    $userModel->update($user->id, ['empresa_id' => $new_empresa_id]);
                }
                $message = 'Empresa cadastrada com sucesso!';
            }

            return redirect()->to('/app/empresa')->with('success', $message);
        } catch (\Exception $e) {
            log_message('error', 'Erro ao salvar empresa: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Erro ao salvar os dados da empresa. Tente novamente.');
        }
    }

    public function checkSubdominio()
    {
        // Limpa qualquer saída anterior
        ob_clean();
        if (ob_get_level()) ob_end_clean();

        $subdominio = $this->request->getGet('subdominio');

        // Validação de caracteres especiais
        if (!preg_match('/^[a-z0-9-]+$/', $subdominio)) {
            return $this->response->setJSON([
                'available' => false,
                'message' => 'O subdomínio pode conter apenas letras minúsculas, números e hífens.'
            ]);
        }

        $fullSubdominio = strtolower($subdominio) . '.' . env('CentralDomain');

        $empresaModel = new \App\Models\EmpresaModel();
        $existingCompany = $empresaModel->where('subdominio', $fullSubdominio)->first();

        $user = auth()->user();
        $session = session();

        if (!$existingCompany) {
            return $this->response->setJSON([
                'available' => true,
                'message' => 'Subdomínio disponível.'
            ]);
        }

        if ($user->inGroup('superadmin')) {
            $empresa_id = $session->get('empresa_id');
            if ($empresa_id && $existingCompany['id'] == $empresa_id) {
                return $this->response->setJSON([
                    'available' => true,
                    'message' => 'Este subdomínio pertence à empresa que você está editando.'
                ]);
            }
        } elseif ($user->empresa_id && $existingCompany['id'] == $user->empresa_id) {
            return $this->response->setJSON([
                'available' => true,
                'message' => 'Este subdomínio pertence à sua empresa.'
            ]);
        }

        return $this->response->setJSON([
            'available' => false,
            'message' => 'Subdomínio indisponível.'
        ]);
    }
}
