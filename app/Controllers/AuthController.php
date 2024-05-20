<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];

        if(session()->get('is_logged_in')) {
            if(session()->get('roles') == 'admin'){
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/dosen/dashboard');
            }
        }

        return view('login', $data);
    }

    public function auth()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getVar('password');

        $user = $this->userModel
            ->where('username', $username)
            ->first();

        if ($user && password_verify($password, $user['password'])) {
            $this->setUserSession($user);
            if(session()->get('roles') == 'admin'){
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/dosen/dashboard');
            }
        } else {
            session()->setFlashdata('errors', 'Invalid username or password');
            return redirect()->back()->withInput();
        }
    }

    public function setUserSession($user)
    {
        $data = [
            'id'    => $user['id'],
            'nama'  => $user['nama'],
            'username' => $user['username'],
            'is_logged_in' => TRUE,
            'roles' => ($user['role_id'] == 1) ? 'admin' : 'dosen'
        ];

        session()->set($data);
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }
}