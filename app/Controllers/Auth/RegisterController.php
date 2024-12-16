<?php

namespace App\Controllers\Auth;

use CodeIgniter\Shield\Controllers\RegisterController as ShieldRegister;
use CodeIgniter\HTTP\RedirectResponse;

class RegisterController extends ShieldRegister
{
    public function registerView()
    {
        $session = session();
        $isMainDomain = $session->get('is_main_domain', false);

        if (!$isMainDomain) {
            return redirect()->to('http://' . env('CentralDomain'));
        }

        return parent::registerView();
    }

    public function registerAction(): RedirectResponse
    {
        $session = session();
        $isMainDomain = $session->get('is_main_domain', false);

        if (!$isMainDomain) {
            return redirect()->to('http://' . env('CentralDomain'));
        }

        return parent::registerAction();
    }
}
