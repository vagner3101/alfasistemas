<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Adminindex extends Controller
{
    public function index()
    {
        // Carregar a view index.php da pasta App
        return view('Admin/index');
    }



    public function erro()
    {
        return view('erro');
    }
}
