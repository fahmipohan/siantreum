<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RedirectResponse;

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
                return redirect()->to('/mahasiswa/dashboard');
            }
        }

        return view('login', $data);
    }

    public function authLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getVar('password');

        $user = $this->userloginModel
            ->where('username', $username)
            ->first();

        if ($user && password_verify($password, $user['password'])) {
            $this->setUserSession($user);
            if (session()->get('roles') == 'admin') {
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/mahasiswa/dashboard');
            }
        } else {
            session()->setFlashdata('errors', 'Invalid username or password');
            return redirect()->back()->withInput();
        }
    }

    public function setUserSession($user)
    {
        $data = [
            'id_users' => $user['id_users'],
            'nama' => $user['nama'],
            'username' => $user['username'],
            'is_logged_in' => TRUE,
            'roles' => ($user['id_role'] == 1) ? 'admin' : 'mahasiswa'
        ];

        session()->set($data);
    }

    public function registrasi()
    {
        $data = [
            'title' => 'Register',
        ];

        return view('register', $data);
    }
    
    public function authRegistrasi()
    {
        // Validation rules for registration
        $validationRules = [
            'nama_lengkap' => 'required',
            'nim' => 'required|numeric',
            'email' => 'required|valid_email',
            'kontak' => 'required|numeric',
            'id_role' => 'required',
            'username' => 'required|is_unique[users.username]',
            'password' => 'required|min_length[6]',
            'agree' => 'required',
        ];

        // Input validation rules
        if ($this->validate($validationRules)) {

            $data = [
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'nim' => $this->request->getVar('nim'),
                'email' => $this->request->getVar('email'),
                'kontak' => $this->request->getVar('kontak'),
                'id_role' => $this->request->getVar('id_role'),
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];

            //Save data to database
            $this->daftarmahasiswaModel->insert();

            //Start massage success 
            session()->setFlashdata('success', 'Berhasil Menambahkan Data');

            // Direct user to login
            return redirect()->to('login');
            
        } else {

            // Error massage if validation failed
            session()->setFlashdata('errors', $this->validator->listErrors());

        }
    }
    

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }
}