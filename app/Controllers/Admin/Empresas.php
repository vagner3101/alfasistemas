<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Empresas extends Controller
{
    public function index()
    {
        // Carregar a view index.php da pasta App
        return view('Admin/empresas');
    }

    public function view()
    {
        // Carregar a view index.php da pasta App
        return view('Admin/empresas');
    }



    public function erro()
    {
        return view('erro');
    }
}
