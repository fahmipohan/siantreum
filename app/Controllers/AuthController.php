<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use DateTime;
use CodeIgniter\HTTP\RedirectResponse;

class AuthController extends BaseController
{
    public function login()
    {
        $data = [
            'title' => 'Login'
        ];

        if (session()->get('is_logged_in')) {
            if (session()->get('roles') == 'admin') {
                return redirect()->to('/antrean_berjalan');
            } else {
                return redirect()->to('/mahasiswa/profil');
            }
        }
        
        return view('login', $data);
    }

    public function setUserSession($user)
    {
        $data = [
            'id_users' => $user['id_users'],
            'username' => $user['username'],
            'is_logged_in' => TRUE,
            'roles' => ($user['id_role'] == 1) ? 'admin' : 'mahasiswa'
        ];

        session()->set($data);
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
                return redirect()->to('/antrean_berjalan');
            } else {
                return redirect()->to('/mahasiswa/progres_approval');
            }
            
        } else {
            session()->setFlashdata('errors', 'Invalid username or password');
            return redirect()->back()->withInput();
        }
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
            'kontak' => 'required|numeric',
            'email' => 'required|valid_email',
            'tgl_rencana' => 'required',
            'username' => 'required|is_unique[users.username]',
            'password' => 'required|min_length[5]',
            'id_role' => 'required',
            'id_jenis_kelamin' => 'required',
            'id_fakultas_mahasiswa' => 'required',
            'id_departemen_mahasiswa' => 'required',
            'id_prodi_departemen' => 'required',
            'agree' => 'required',
        ];

        // Input validation rules
        if ($this->validate($validationRules)) {

            $tglRencana = $this->request->getVar('tgl_rencana');
            $date = new DateTime($tglRencana);
            $formattedDate = $date->format('Y-m-d'); // Format the date for database

            // Check if the selected date already has 10 users
            $userCount = $this->dateselectModel->countUsersByDate($formattedDate);
            if ($userCount >= 10) {
                return redirect()->back()->with('error', 'Tanggal ini sudah penuh. Silakan pilih tanggal lain.');
            }

            $data = [
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'nim' => $this->request->getVar('nim'),
                'kontak' => $this->request->getVar('kontak'),
                'email' => $this->request->getVar('email'),
                'tgl_rencana' => $formattedDate,
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'id_role' => $this->request->getVar('id_role'),
                'id_jenis_kelamin' => $this->request->getVar('id_jenis_kelamin'),
                'id_fakultas_mahasiswa' => $this->request->getVar('id_fakultas_mahasiswa'),
                'id_departemen_mahasiswa' => $this->request->getVar('id_departemen_mahasiswa'),
                'id_prodi_departemen' => $this->request->getVar('id_prodi_departemen'),
                'status_approval' => 'pending'
            ];

            // Save user registration data
            $this->daftarmahasiswaModel->createUser($data);

            // Save date selection
            $dateSelectionData = [
                'id_users' => $this->daftarmahasiswaModel->insertID(),
                'tanggal_terpilih' => $formattedDate
            ];

            $this->dateselectModel->addUserDateSelection($dateSelectionData);

            // Direct user to login with success message
            return redirect('login')->with('success', 'Pendaftaran Berhasil, Silahkan Login untuk Melihat Progress Approval Antrian Anda!');
            
        } else {

            // Error massage if validation failed
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }
    

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }
}