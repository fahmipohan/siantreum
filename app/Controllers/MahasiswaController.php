<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\userloginModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\I18n\Time;
use Ramsey\Uuid\Uuid;

class MahasiswaController extends BaseController
{
    public function index()
    {
        $userId = $this->session->get('id_users');
        $profilmahasiswa  = $this->daftarmahasiswaModel
            ->select('users.*, jenis_kelamin.id_jenis_kelamin as jenis_kelamin, fakultas_mahasiswa.id_fakultas_mahasiswa as fakultas, departemen_mahasiswa.id_departemen_mahasiswa as departemen, prodi_departemen.id_prodi_departemen as prodi')
            ->join('role', 'users.id_role = role.id_role')
            ->join('jenis_kelamin', 'users.id_jenis_kelamin = jenis_kelamin.id_jenis_kelamin')
            ->join('fakultas_mahasiswa', 'users.id_fakultas_mahasiswa = fakultas_mahasiswa.id_fakultas_mahasiswa')
            ->join('departemen_mahasiswa', 'users.id_departemen_mahasiswa = departemen_mahasiswa.id_departemen_mahasiswa')
            ->join('prodi_departemen', 'users.id_prodi_departemen = prodi_departemen.id_prodi_departemen')
            ->where('id_users', $userId)
            ->first(); // atau metode fetch yang sesuai

        $data = [
            'title' => 'Profil Saya',
            'menu' => 'profil',
            'profilmahasiswa' => $profilmahasiswa, $userId,
            'pager' => $this->daftarmahasiswaModel->pager,

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

        return view('mahasiswa/profil', $data);
    }


    public function indexApproval()
    {
        $userId = $this->session->get('id_users');
        $approval = $this->daftarmahasiswaModel
            ->select('users.*, users.nama_lengkap, users.nim, fakultas_mahasiswa.id_fakultas_mahasiswa as fakultas_mahasiswa, departemen_mahasiswa.id_departemen_mahasiswa as departemen, prodi_departemen.id_prodi_departemen as program_studi, users.tgl_rencana, users.status_approval')
            ->join('role', 'users.id_role = role.id_role')
            ->join('fakultas_mahasiswa', 'users.id_fakultas_mahasiswa = fakultas_mahasiswa.id_fakultas_mahasiswa')
            ->join('departemen_mahasiswa', 'users.id_departemen_mahasiswa = departemen_mahasiswa.id_departemen_mahasiswa')
            ->join('prodi_departemen', 'users.id_prodi_departemen = prodi_departemen.id_prodi_departemen')
            ->where('users.id_users', $userId)
            ->paginate(10);

        $data = [
            'title' => 'Progres Approval',
            'menu' => 'progres_approval',
            'approve' => $approval, $userId,
            'pager' => $this->daftarmahasiswaModel->pager,

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

        return view('mahasiswa/progres-approval', $data);
    }

    public function indexAntreanSekarang()
    {
        $approval = $this->daftarmahasiswaModel
            ->join('role', 'users.id_role = role.id_role')
            ->join('jenis_kelamin', 'users.id_jenis_kelamin = jenis_kelamin.id_jenis_kelamin')
            ->join('fakultas_mahasiswa', 'users.id_fakultas_mahasiswa = fakultas_mahasiswa.id_fakultas_mahasiswa')
            ->join('departemen_mahasiswa', 'users.id_departemen_mahasiswa = departemen_mahasiswa.id_departemen_mahasiswa')
            ->join('prodi_departemen', 'users.id_prodi_departemen = prodi_departemen.id_prodi_departemen')
            ->where('status_approval', 'approved')
            ->paginate(10);

        $data = [
            'title' => 'Antrean Saat ini',
            'menu' => 'antrean_sekarang',
            'approve' => $approval,
            'total_antrean' => $this->antreanModel->query("SELECT COUNT(*) as total FROM users WHERE status_approval IN ('approved', 'rejected')")->getRow()->total,
            'total_mahasiswa_daftar' => $this->userloginModel->getTotal(2),
            'pager' => $this->daftarmahasiswaModel->pager,
            // 'antre' => $this->antreanModel->getAntreanByUserId($userId),
            // 'current_antre' => $currentAntre,
        ];

        return view('mahasiswa/antrean-sekarang', $data);
    }

    // public function editAntrean()
    // {
    //     $id = $this->request->getGet('id');
    //     $antre = $this->antreanModel->find($id);
    //     $jakartaTime = Time::now('Asia/Jakarta');
    //     $date = $jakartaTime->format('Y-m-d');

    //     $antreans = $this->antreanModel
    //         ->select('antrean.*, users.nama_lengkap as mahasiswa_nama')
    //         ->join('users', 'antrean.id_antrean = users.id_users')
    //         ->where('antrean.id_antrean', $id)
    //         ->first();

    //     if (!$antre || $antre['id_antrean'] != $this->session->get('id')) {
    //         throw new PageNotFoundException();
    //     }

    //     $data = [
    //         'antre' => $antre,
    //         'title' => 'Edit Data Antrean',
    //         'tanggal' => $date,
    //         'mahasiswa' => $antreans
    //     ];

    //     return view('mahasiswa/edit-antrean', $data);
    // }

    // public function updateAntrean($id)
    // {
    //     $antre = $this->antreanModel->find($id);
    //     $data = [
    //         'tanggal' => $this->request->getVar('date'),
    //         'maks_antrean' => $this->request->getVar('antrean'),
    //         'keterangan' => $this->request->getVar('keterangan')
    //     ];


    //     if (!$antre || $antre['id_antrean'] != $this->session->get('id')) {
    //         throw new PageNotFoundException();
    //     }

    //     $this->antreanModel->editAntrean($id, $data);

    //     return redirect('mahasiswa/kelola_antrean')->with('success', "Data Berhasil Diperbaharui");
    // }

    // public function indexData()
    // {
    //     $kode_verif = session()->get('kode_verif');

    //     if (!$kode_verif) {
    //         throw new PageNotFoundException();
    //     }

    //     return view('user/ambil-antrean');
    // }

    // public function storeDataAntrean()
    // {
    //     $uuid = Uuid::uuid4();
    //     $kode_verif = substr($uuid, 0, 4);
    //     $id_mahasiswa = $this->request->getVar('id_mahasiswa');
    //     $lastNumber = $this->dataModel->where('antrean_id', $id_mahasiswa)->select('no_urut')->orderBy('id', 'DESC')->first();
    //     $lastNumber = $lastNumber ? $lastNumber['no_urut'] : 0;
    //     $no_urut = $lastNumber + 1;

    //     $data = [
    //         'kode_verif' => $kode_verif,
    //         'antrean_id' => $id_mahasiswa,
    //         'no_urut' => $no_urut
    //     ];

    //     $this->dataModel->insert($data);
    //     $totalAntrean = $this->dataModel->where('antrean_id', $id_mahasiswa)->countAllResults();
    //     $this->antreanModel->where('id', $id_mahasiswa)->set('jumlah_antrean', $totalAntrean)->update();

    //     $mahasiswaName = $this->antreanModel
    //         ->select('antrean.*, users.nama_lengkap as mahasiswa_nama')
    //         ->join('users', 'antrean.id_users = users.id_users')
    //         ->where('antrean.id_users', $id_mahasiswa)
    //         ->first();

    //     session()->setFlashdata('kode_verif', $kode_verif);
    //     session()->setFlashdata('no_urut', $no_urut);
    //     session()->setFlashdata('nama_mahasiswa', $mahasiswaName['mahasiswa_nama']);

    //     return redirect()->to('/ambil_antrean');
    // }

    // public function nextAntrean()
    // {
    //     $userId = $this->session->get('id');

    //     $antrean = $this->antreanModel->where('id_users', $userId)->first();
    //     $dataAntre = $this->dataModel->getAntreanByUserId($userId);

    //     if ($antrean && $dataAntre) {
    //         $current_antre = $antrean['current_antre'] + 1;

    //         $this->antreanModel
    //             ->where('id_users', $antrean['id_users'])
    //             ->set('current_antre', $current_antre)
    //             ->update();

    //         $successMessage = "Antrean " . $current_antre . " berhasil dipanggil";

    //         return redirect()->to('/mahasiswa/dashboard')->with('success', $successMessage);
    //     } else {
    //         return redirect()->to('/mahasiswa/dashboard')->with('errors', "Tidak ada data antrean");
    //     }
    // }

    // public function resetAntrean()
    // {
    //     $userId = $this->session->get('id');

    //     $this->dataModel->resetQueue($userId);

    //     $this->antreanModel
    //         ->set(['current_antre' => 0, 'jumlah_antrean' => 0])
    //         ->where('id_users', $userId)
    //         ->update();

    //     return redirect()->to('/mahasiswa/dashboard')->with('success', 'Berhasil Melakukan Reset pada Antrean');
    // }

    // public function getQueueData()
    // {
    //     $antrean = $this->antreanModel->findAll(); // Fetch all antrean data
    //     // Return the data in JSON format
    //     return $this->response->setJSON($antrean);
    // }

    public function indexCopy()
    {
        $userId = $this->session->get('id');
        $antre = $this->antreanModel->where('id_antrean', $userId)->first();

        if ($antre !== null) {
            $currentAntre = $antre['current_antre'];
            $jumlahAntre = $antre['jumlah_antrean'];
        } else {
            $currentAntre = 0;
            $jumlahAntre = 0;
        }

        $data = [
            'title' => 'Copy Layout',
            'menu' => 'copy_lay',
            'antre' => $this->dataModel->getAntreanByUserId($userId),
            'current_antre' => $currentAntre,
            'next_antre' => $currentAntre + 1,
            'total_antre' => $this->dataModel->countAntreanByUserId($userId),
            'sisa_antre' => $jumlahAntre - $currentAntre,

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

        return view('mahasiswa/copy-lay', $data);
    }
}