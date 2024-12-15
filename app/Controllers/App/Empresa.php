<?php

namespace App\Controllers\App;

use CodeIgniter\Controller;

class Empresa extends Controller
{
    public function index()
    {
        // Esta página não deve redirecionar, mesmo se o usuário não tiver empresa
        return view('App/empresa');
    }

    public function salvar()
    {
        // Lógica para salvar os dados da empresa e vincular ao usuário
        // ...

        // Após salvar, redirecione para a dashboard ou página inicial
        return redirect()->to('/app/dashboard');
    }
}
