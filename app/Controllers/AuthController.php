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

        if (session()->get('is_logged_in')) {
            if (session()->get('roles') == 'admin') {
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/dosen/dashboard');
            }
        }

        return view('login', $data);
    }

    public function registrasi()
    {
        $validationRules = [
            'nama_lengkap' => 'required',
            'nim' => 'required',
            'email' => 'required|valid_email',
            'role' => 'required',
            'username' => 'required|is_unique[users.username]',
            'password' => 'required',
            'agree' => 'required',
        ];

        if ($this->validate($validationRules)) {

            $data = [
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'nim' => $this->request->getVar('nim'),
                'email' => $this->request->getVar('email'),
                'role' => $this->request->getVar('role'),
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password'),
            ];

            $this->daftarmahasiswaModel->createUser($data);
            session()->setFlashdata('success', 'Berhasil Menambahkan Data');
            return redirect()->to('login');
        } else {

            $data = [
                'title' => 'Register',
            ];

            return view('register', $data);
        }
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
            if (session()->get('roles') == 'admin') {
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
            'id' => $user['id'],
            'nama' => $user['nama'],
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