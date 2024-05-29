<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\I18n\Time;
use Ramsey\Uuid\Uuid;

class DosenController extends BaseController
{
    public function index()
    {
        $userId = $this->session->get('id');
        $antre = $this->antreanModel->where('dosen_id', $userId)->first();

        if ($antre !== null) {
            $currentAntre = $antre['current_antre'];
            $jumlahAntre = $antre['jumlah_antrean'];
        } else {
            $currentAntre = 0;
            $jumlahAntre = 0;
        }

        $data = [
            'title' => 'Dashboard Dosen',
            'antre' => $this->dataModel->getAntreanByUserId($userId),
            'current_antre' => $currentAntre,
            'next_antre'    => $currentAntre + 1,
            'total_antre'   => $this->dataModel->countAntreanByUserId($userId),
            'sisa_antre'    => $jumlahAntre - $currentAntre
        ];

        return view('dosen/dashboard', $data);
    }

    public function indexAntrean()
    {
        $userId = $this->session->get('id');
        $data = [
            'title' => 'Kelola Antrean',
            'antre' => $this->antreanModel->getAntreanByUserId($userId),
            'pager' => $this->antreanModel->pager
        ];

        return view('dosen/kelola-antrean', $data);
    }

    public function editAntrean()
    {
        $id = $this->request->getGet('id');
        $antre = $this->antreanModel->find($id);
        $jakartaTime = Time::now('Asia/Jakarta');
        $date = $jakartaTime->format('Y-m-d');

        $antreans = $this->antreanModel
            ->select('antrean.*, users.nama as dosen_nama')
            ->join('users', 'antrean.dosen_id = users.id')
            ->where('antrean.id', $id)
            ->first();

        if (!$antre || $antre['dosen_id'] != $this->session->get('id')) {
            throw new PageNotFoundException();
        }

        $data = [
            'antre'   => $antre,
            'title'   => 'Edit Data Antrean',
            'tanggal' => $date,
            'dosen'   => $antreans
        ];

        return view('dosen/edit-antrean', $data);
    }

    public function updateAntrean($id)
    {
        $antre = $this->antreanModel->find($id);
        $data = [
            'tanggal'      => $this->request->getVar('date'),
            'maks_antrean' => $this->request->getVar('antrean'),
            'keterangan'   => $this->request->getVar('keterangan')
        ];


        if (!$antre || $antre['dosen_id'] != $this->session->get('id')) {
            throw new PageNotFoundException();
        }

        $this->antreanModel->editAntrean($id, $data);

        return redirect('dosen/kelola_antrean')->with('success', "Data Berhasil Diperbaharui");
    }

    public function indexData()
    {
        $kode_verif = session()->get('kode_verif');

        // if (!$kode_verif) {
        //     throw new PageNotFoundException();
        // }

        return view('user/ambil-antrean');
    }

    public function storeDataAntrean()
    {
        $uuid = Uuid::uuid4();
        $kode_verif = substr($uuid, 0, 4);
        $id_dosen = $this->request->getVar('id_dosen');
        $lastNumber = $this->dataModel->where('antrean_id', $id_dosen)->select('no_urut')->orderBy('id', 'DESC')->first();
        $lastNumber = $lastNumber ? $lastNumber['no_urut'] : 0;
        $no_urut = $lastNumber + 1;

        $data = [
            'kode_verif' => $kode_verif,
            'antrean_id' => $id_dosen,
            'no_urut'    => $no_urut
        ];

        $this->dataModel->insert($data);
        $totalAntrean = $this->dataModel->where('antrean_id', $id_dosen)->countAllResults();
        $this->antreanModel->where('id', $id_dosen)->set('jumlah_antrean', $totalAntrean)->update();

        $dosenName = $this->antreanModel
            ->select('antrean.*, users.nama as dosen_nama')
            ->join('users', 'antrean.dosen_id = users.id')
            ->where('antrean.id', $id_dosen)
            ->first();

        session()->setFlashdata('kode_verif', $kode_verif);
        session()->setFlashdata('no_urut', $no_urut);
        session()->setFlashdata('nama_dosen', $dosenName['dosen_nama']);

        return redirect()->to('/ambil_antrean');
    }

    public function nextAntrean()
    {
        $userId = $this->session->get('id');

        $antrean = $this->antreanModel->where('dosen_id', $userId)->first();
        $dataAntre = $this->dataModel->getAntreanByUserId($userId);

        if ($antrean && $dataAntre) {
            $current_antre = $antrean['current_antre'] + 1;

            $this->antreanModel
                ->where('dosen_id', $antrean['dosen_id'])
                ->set('current_antre', $current_antre)
                ->update();

            $successMessage = "Antrean " . $current_antre . " berhasil dipanggil";

            return redirect()->to('/dosen/dashboard')->with('success', $successMessage);
        } else {
            return redirect()->to('/dosen/dashboard')->with('errors', "Tidak ada data antrean");
        }
    }

    public function resetAntrean()
    {
        $userId = $this->session->get('id');

        $this->dataModel->resetQueue($userId);

        $this->antreanModel
            ->set(['current_antre' => 0, 'jumlah_antrean' => 0])
            ->where('dosen_id', $userId)
            ->update();

        return redirect()->to('/dosen/dashboard')->with('success', 'Berhasil Melakukan Reset pada Antrean');
    }

    public function getQueueData()
    {
        $antrean = $this->antreanModel->findAll(); // Fetch all antrean data
        // Return the data in JSON format
        return $this->response->setJSON($antrean);
    }
}