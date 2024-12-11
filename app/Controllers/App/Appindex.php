<?php

namespace App\Controllers\App;

use CodeIgniter\Controller;

class Appindex extends Controller
{
    public function index()
    {
        // Verifica se a empresa está na sessão
        $empresa_id = session()->get('empresa_id');
        if (!$empresa_id) {
            return redirect()->to('/login');
        }

        // Carregar a view faq.php da pasta App
        return view('App/login');
    }

    public function erro()
    {
        return view('erro');
    }
}
