<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\userloginModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Exceptions\PageNotFoundException;

class AdminController extends BaseController
{
    public function index()
    {
        // $antreans = $this->antreanModel
        //     ->select('antrean.*, users.nama_lengkap as mahasiswa_nama, users.nim as nim, users.id_fakultas_mahasiswa as fakultas, users.id_departemen_mahasiswa as departemen, users.id_prodi_departemen as prodi, users.status_approval as status')
        //     ->join('users', 'antrean.id_users = users.id_users')
        //     ->whereIn('users.status_approval', ['approved', 'rejected'])
        //     ->paginate(10);

        $approval = $this->daftarmahasiswaModel
            ->join('role', 'users.id_role = role.id_role')
            ->join('jenis_kelamin', 'users.id_jenis_kelamin = jenis_kelamin.id_jenis_kelamin')
            ->join('fakultas_mahasiswa', 'users.id_fakultas_mahasiswa = fakultas_mahasiswa.id_fakultas_mahasiswa')
            ->join('departemen_mahasiswa', 'users.id_departemen_mahasiswa = departemen_mahasiswa.id_departemen_mahasiswa')
            ->join('prodi_departemen', 'users.id_prodi_departemen = prodi_departemen.id_prodi_departemen')
            ->where('status_approval', 'approved')
            ->paginate(10);

        $data = [
            'title' => 'Antrean Berjalan',
            'menu' => 'antrean_berjalan',
            'approve' => $approval,
            'pager' => $this->antreanModel->pager,
            'total_mahasiswa_daftar' => $this->userloginModel->getTotal(2),
            'total_admin' => $this->userloginModel->getTotal(1),
            'total_antrean' => $this->antreanModel->query("SELECT COUNT(*) as total FROM users WHERE status_approval IN ('approved', 'rejected')")->getRow()->total,
            // 'total_antrean' => $this->antreanModel->query("SELECT SUM(jumlah_antrean) as total FROM antrean")->getRow()->total,
        ];

        return view('admin/antrean-berjalan', $data);
    }

    public function nextAntrean()
    {
        $userId = $this->session->get('id');

        $antrean = $this->antreanModel->where('id_users', $userId)->first();
        $dataAntre = $this->dataModel->getAntreanByUserId($userId);

        if ($antrean && $dataAntre) {
            $current_antre = $antrean['current_antre'] + 1;

            $this->antreanModel
                ->where('id_users', $antrean['id_users'])
                ->set('current_antre', $current_antre)
                ->update();

            $successMessage = "Antrean " . $current_antre . " berhasil dipanggil";

            return redirect()->to('/mahasiswa/dashboard')->with('success', $successMessage);
        } else {
            return redirect()->to('/mahasiswa/dashboard')->with('errors', "Tidak ada data antrean");
        }
    }

    public function resetAntrean()
    {
        $userId = $this->session->get('id');

        $this->dataModel->resetQueue($userId);

        $this->antreanModel
            ->set(['current_antre' => 0, 'jumlah_antrean' => 0])
            ->where('id_users', $userId)
            ->update();

        return redirect()->to('/mahasiswa/dashboard')->with('success', 'Berhasil Melakukan Reset pada Antrean');
    }

    public function getQueueData()
    {
        $antrean = $this->antreanModel->findAll(); // Fetch all antrean data
        // Return the data in JSON format
        return $this->response->setJSON($antrean);
    }

    public function indexMahasiswa()
    {
        $model = new UserLoginModel();

        $mahasiswa = $this->daftarmahasiswaModel
            ->select('users.*, jenis_kelamin.id_jenis_kelamin as jenis_kelamin, fakultas_mahasiswa.id_fakultas_mahasiswa as fakultas_mahasiswa, departemen_mahasiswa.id_departemen_mahasiswa as departemen_mahasiswa, prodi_departemen.id_prodi_departemen as prodi_departemen')
            ->join('role', 'users.id_role = role.id_role')
            ->join('jenis_kelamin', 'users.id_jenis_kelamin = jenis_kelamin.id_jenis_kelamin')
            ->join('fakultas_mahasiswa', 'users.id_fakultas_mahasiswa = fakultas_mahasiswa.id_fakultas_mahasiswa')
            ->join('departemen_mahasiswa', 'users.id_departemen_mahasiswa = departemen_mahasiswa.id_departemen_mahasiswa')
            ->join('prodi_departemen', 'users.id_prodi_departemen = prodi_departemen.id_prodi_departemen')
            ->where('status_approval', 'pending')
            ->orderBy('id_users', 'DESC')

            ->findAll(); // atau metode fetch yang sesuai

        $data = [
            'title' => 'Approval Antrean',
            'menu' => 'approval_antrean',
            'mahasiswa' => $model->getUsersByRole(2),
            $mahasiswa,
            'pager' => $model->pager,

            'jenis_kelamin' => [
                1 => 'Laki-laki',
                2 => 'Perempuan'
            ],

            'fakultas' => [
                1 => 'Vokasi'
            ],

            'departemen' => [
                1 => 'Bisnis dan Hospitality',
                2 => 'Industri Kreatif dan Digital'
            ],

            'prodi' => [
                1 => 'D4 Manajemen Perhotelan',
                2 => 'D3 Keuangan dan Perbankan',
                3 => 'D3 Administrasi Bisnis',
                4 => 'D4 Desain Grafis',
                5 => 'D3 Teknologi Informasi'
            ]
        ];

        return view('admin/approval-antrean', $data);
    }

    public function approve()
    {
        $id_users = $this->request->getGet('id_users');
        $this->daftarmahasiswaModel->approveUser($id_users);
        return redirect()->back()->with('success', 'Mahasiswa berhasil di-approve.');
    }

    public function reject()
    {
        $id_users = $this->request->getGet('id_users');
        $this->daftarmahasiswaModel->rejectUser($id_users);
        return redirect()->back()->with('success', 'Mahasiswa berhasil di-reject.');
    }

    public function indexProfil()
    {
        $id_users = $this->session->get('id_users');
        $user = $this->userloginModel->getUserById($id_users);

        // $model = new userloginModel();
        if ($user && $user['id_role'] == 1) {
            $data = [
                'admin' => $user,
                'title' => 'Profil Saya',
                'menu' => 'profil',
            ];

            return view('admin/profil', $data);
        } else {
            throw new PageNotFoundException();
        }
    }

    public function updateProfil($id_users)
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $user = $this->userloginModel->getUserById($id_users);

        if ($user && $user['id_role'] == 1) {
            $this->userloginModel->updateUser($id_users, $data);
            return redirect('profil')->back()->with('success', 'Data Berhasil Diperbaharui');
        } else {
            throw new PageNotFoundException();
        }

        // session()->setFlashdata('success', 'Data Berhasil Diperbaharui');
        // return redirect()->to('/profil');
        // return redirect('profil')->back()->with('success', 'Data Berhasil Diperbaharui');
    }

    public function addMahasiswa()
    {
        $validationRules = [
            'username' => 'required|is_unique[users.username]',
            'password' => 'required',
            'email' => 'required',
            'prodi' => 'required'
        ];

        if ($this->validate($validationRules)) {

            $data = [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'email' => $this->request->getPost('email'),
                'prodi' => $this->request->getPost('prodi'),
                'id_role' => 2
            ];
            $this->userloginModel->createUser($data);
            return redirect()->back()->withInput()->with('success', 'Berhasil Menambahkan Data');
        } else {
            return redirect()->back()->withInput()->with('errors', 'Kesalahan dalam Inputan');
        }
    }

    public function deleteMahasiswa($id_users)
    {
        $user = $this->userloginModel->getUserById($id_users);

        if ($user && $user['id_role'] == 2) {
            $this->userloginModel->deleteUser($id_users);

            $this->sendEmail($user['email']);
            return redirect('approval_antrean')->back()->with('success', 'Berhasil Menghapus Mahasiswa');
        } else {
            throw new PageNotFoundException();
        }
    }

    public function detailMahasiswa()
    {
        $id_users = $this->request->getGet('id_users');
        $user = $this->userloginModel->getUserById($id_users);
        $mahasiswa = $this->daftarmahasiswaModel
            ->select('users.*, role.id_role as role,jenis_kelamin.id_jenis_kelamin as jenis_kelamin, fakultas_mahasiswa.id_fakultas_mahasiswa as fakultas_mahasiswa, departemen_mahasiswa.id_departemen_mahasiswa as departemen_mahasiswa, prodi_departemen.id_prodi_departemen as prodi_departemen')
            ->join('role', 'users.id_role = role.id_role')
            ->join('jenis_kelamin', 'users.id_jenis_kelamin = jenis_kelamin.id_jenis_kelamin')
            ->join('fakultas_mahasiswa', 'users.id_fakultas_mahasiswa = fakultas_mahasiswa.id_fakultas_mahasiswa')
            ->join('departemen_mahasiswa', 'users.id_departemen_mahasiswa = departemen_mahasiswa.id_departemen_mahasiswa')
            ->join('prodi_departemen', 'users.id_prodi_departemen = prodi_departemen.id_prodi_departemen')
            ->findAll();

        $data = [
            'user' => $user,
            $mahasiswa,
            'title' => 'Detail Data Mahasiswa',
            'menu' => 'detail_mahasiswa',

            'role' => [
                1 => 'Admin',
                2 => 'Mahasiswa'
            ],

            'jenis_kelamin' => [
                1 => 'Laki-laki',
                2 => 'Perempuan'
            ],

            'fakultas' => [
                1 => 'Vokasi'
            ],

            'departemen' => [
                1 => 'Bisnis dan Hospitality',
                2 => 'Industri Kreatif dan Digital'
            ],

            'prodi' => [
                1 => 'D4 Manajemen Perhotelan',
                2 => 'D3 Keuangan dan Perbankan',
                3 => 'D3 Administrasi Bisnis',
                4 => 'D4 Desain Grafis',
                5 => 'D3 Teknologi Informasi'
            ]
        ];

        if (!$user) {
            throw new PageNotFoundException();
        }

        return view('admin/detail-mahasiswa', $data);
    }

    public function editMahasiswa()
    {
        $id_users = $this->request->getGet('id_users');
        $user = $this->userloginModel->getUserById($id_users);
        $mahasiswa = $this->daftarmahasiswaModel
            ->select('users.*, jenis_kelamin.id_jenis_kelamin as jenis_kelamin, fakultas_mahasiswa.id_fakultas_mahasiswa as fakultas_mahasiswa, departemen_mahasiswa.id_departemen_mahasiswa as departemen_mahasiswa, prodi_departemen.id_prodi_departemen as prodi_departemen')
            ->join('role', 'users.id_role = role.id_role')
            ->join('jenis_kelamin', 'users.id_jenis_kelamin = jenis_kelamin.id_jenis_kelamin')
            ->join('fakultas_mahasiswa', 'users.id_fakultas_mahasiswa = fakultas_mahasiswa.id_fakultas_mahasiswa')
            ->join('departemen_mahasiswa', 'users.id_departemen_mahasiswa = departemen_mahasiswa.id_departemen_mahasiswa')
            ->join('prodi_departemen', 'users.id_prodi_departemen = prodi_departemen.id_prodi_departemen')
            ->findAll();

        $data = [
            'user' => $user,
            $mahasiswa,
            'title' => 'Edit Data Mahasiswa',
            'menu' => 'edit_mahasiswa',

            'jenis_kelamin' => [
                1 => 'Laki-laki',
                2 => 'Perempuan'
            ],

            'fakultas' => [
                1 => 'Vokasi'
            ],

            'departemen' => [
                1 => 'Bisnis dan Hospitality',
                2 => 'Industri Kreatif dan Digital'
            ],

            'prodi' => [
                1 => 'D4 Manajemen Perhotelan',
                2 => 'D3 Keuangan dan Perbankan',
                3 => 'D3 Administrasi Bisnis',
                4 => 'D4 Desain Grafis',
                5 => 'D3 Teknologi Informasi'
            ]
        ];

        if (!$user) {
            throw new PageNotFoundException();
        }

        return view('admin/edit-mahasiswa', $data);
    }

    public function updateMahasiswa($id_users)
    {
        $passw = $this->request->getVar('password');
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($passw, PASSWORD_DEFAULT),
            'email' => $this->request->getPost('email'),
            'prodi' => $this->request->getPost('prodi'),
        ];

        $user = $this->userloginModel->getUserById($id_users);

        if ($user && $user['id_role'] !== 2) {
            $this->userloginModel->updateUser($id_users, $data);
            return redirect()->to('/kelola_mahasiswa')->with('success', 'Data Berhasil Diperbaharui');
        } else {
            throw new PageNotFoundException();
        }
        // $this->userModel->updateUser($id, $data);
        // return redirect('kelola_dosen')->back()->with('success', 'Data Berhasil Diperbaharui');
    }

    public function aktivasi($id)
    {

        $user = $this->userloginModel->find($id);
        if ($user) {

            $status = ($user['status'] == 'aktif') ? 'nonaktif' : 'aktif';

            $data = [
                'status' => $status,
            ];

            $this->userloginModel->updateUser($id, $data);
            // return redirect()->to('/approval_antrean')->with('success', 'Data Berhasil Diperbaharui');
            return redirect()->to('/');
            // return redirect()->to(base_url('/approval_antrean'))->with('success', 'User Telah'. $status);
        } else {
            return redirect()->to(base_url('/approval_antrean'))->with('errors', 'User Tidak Diketahui');

        }

    }

    public function sendEmail($kepada = null)
    {
        $email = \Config\Services::email();

        $email->setTo($kepada);
        $email->setSubject('Akun Terhapus');
        $email->setMessage('<h1>Akun Anda di Reject/Hapus! Terdapat data yang tidak sesuai pada inputan yang anda lakukan, harap lakukan registrasi ulang pada akun anda!</p>');

        if ($email->send()) {
            echo 'Email successfully sent';
        } else {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }
}

// Antrean
// public function indexAntrean()
// {
//     $jakartaTime = Time::now('Asia/Jakarta');
//     $date = $jakartaTime->format('Y-m-d');

//     $antreans = $this->antreanModel
//         ->select('antrean.*, users.nama_lengkap as mahasiswa_nama')
//         ->join('users', 'antrean.id_users = users.id_users')
//         ->paginate(10);

//     $data = [
//         'title' => 'Kelola Antrean',
//         'menu' => 'kelola_antrean',
//         'mahasiswa' => $this->userloginModel->getUsersByRole(2),
//         'antre' => $antreans,
//         'pager' => $this->antreanModel->pager,
//         'tanggal' => $date
//     ];

//     return view('admin/kelola-antrean', $data);
// }

// public function addAntrean()
// {
//     $data = [
//         'id_antrean' => $this->request->getVar('optionMahasiswa'),
//         'tanggal' => $this->request->getVar('date'),
//         'maks_antrean' => $this->request->getVar('antrean'),
//         'current_antre' => 0
//     ];

//     $antreanId = $this->antreanModel->createAntrean($data);
//     $userId = $this->request->getVar('optionMahasiswa');

//     $this->userloginModel->update($userId, ['id_antrean' => $antreanId]);

//     return redirect('kelola_antrean')->back()->with('success', 'Berhasil Menambahkan Data');
// }

// public function deleteAntrean($id)
// {
//     $antre = $this->antreanModel->find($id);

//     if (!$antre) {
//         throw new PageNotFoundException();
//     }

//     $this->userloginModel->where('id_antrean', $id)->set('id_antrean', NULL)->update();
//     $this->antreanModel->deleteAntrean($id);

//     return redirect('kelola_antrean')->back()->with('success', 'Berhasil Menghapus Data Antrean');
// }

// public function editAntrean()
// {
//     $id = $this->request->getGet('id');
//     $antre = $this->antreanModel->find($id);
//     $jakartaTime = Time::now('Asia/Jakarta');
//     $date = $jakartaTime->format('Y-m-d');

//     $antreans = $this->antreanModel
//         ->select('antrean.*, users.nama_lengkap as mahasiswa_nama')
//         ->join('users', 'antrean.id_antrean = users.id_users')
//         ->where('antrean.id', $id)
//         ->first();

//     $data = [
//         'antre' => $antre,
//         'title' => 'Edit Data Antrean',
//         'dosen' => $antreans,
//         'tanggal' => $date
//     ];

//     if (!$antre) {
//         throw new PageNotFoundException();
//     }

//     return view('admin/edit-antrean', $data);
// }

// public function updateAntrean($id)
// {
//     $antre = $this->antreanModel->find($id);
//     $data = [
//         'tanggal' => $this->request->getVar('date'),
//         'maks_antrean' => $this->request->getVar('antrean')
//     ];

//     if (!$antre) {
//         throw new PageNotFoundException();
//     }

//     $this->antreanModel->editAntrean($id, $data);

//     return redirect('kelola_antrean')->back()->with('success', "Data Berhasil Diperbaharui");
// }