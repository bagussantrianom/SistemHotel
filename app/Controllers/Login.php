<?php

namespace App\Controllers;

class Login extends BaseController
{

    public function proses_login()
    {
        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");

        if ($username == 'admin' && $password == 'admin') {
            return redirect()->to('/admin');
        }
        return redirect()->to('/');
    }
}
