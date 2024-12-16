<?php

namespace App\Controllers\Auth;

use CodeIgniter\Controller;

class Error403 extends Controller
{
    public function index()
    {
        // Esta página não deve redirecionar, mesmo se o usuário não tiver empresa
        return view('Auth/error-403');
    }
}
