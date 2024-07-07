<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
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
            'title' => 'SIANTREUM',
            'pager' => $this->daftarmahasiswaModel->pager,
            'approve' => $approval,
        ];

        return view('landingpage', $data);
    }

    public function monitorAntrean()
    {
        $antreans = $this->antreanModel
            ->select('antrean.*, users.nama_lengkap as mahasiswa_nama')
            ->join('users', 'antrean.id_antrean = users.id_users')
            ->get()
            ->getResultArray();

        $data = [
            'antre' => $antreans
        ];

        return view('user/monitor-antrean', $data);
    }

}