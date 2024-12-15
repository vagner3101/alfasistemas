<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->to('/login');
        }

        $userModel = model('UserModel');
        $userLevel = $userModel->getUserLevel($user->id);

        if (!in_array($userLevel, $arguments)) {
            return redirect()->to('/access-denied');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}
