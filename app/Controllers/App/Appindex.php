<?php

namespace App\Controllers\App;

use CodeIgniter\Controller;

class Appindex extends Controller
{
    public function index()
    {
        // Carregar a view index.php da pasta App
        return view('App/index');
    }



    public function erro()
    {
        return view('erro');
    }
}
